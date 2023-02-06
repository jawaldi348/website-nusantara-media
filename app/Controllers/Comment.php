<?php

namespace App\Controllers;

class Comment extends BaseController
{
    public function __construct()
    {
        $this->Mcomment = new \App\Models\Mcomment();
    }
    public function show_comments($commentResult)
    {
        $commentHTML = '';
        foreach ($commentResult as $comment) {
            $commentHTML .= '
            <div class="komentar-iframe-min-list-content__item" id="cmt71550011">
                <div class="komentar-iframe-min-media komentar-iframe-min-media--left komentar-iframe-min-media--image-circle">
                    <div class="komentar-iframe-min-media__image"><span class="komentar-iframe-min-ratiobox"><img src="' . getenv('urlassets') . 'default/default-user.jpg' . '" alt="image author - ' . getenv('urlassets') . 'default/default-user.jpg' . '" title="image author - ' . getenv('urlassets') . 'default/default-user.jpg' . '"></span></div>
                    <div class="komentar-iframe-min-media__text">
                        <div class="komentar-iframe-min-media__user">' . $comment['nama'] . ' </div>
                        <div class="komentar-iframe-min-media__date">' . $comment['timeAgo'] . '</div>
                        <div class="komentar-iframe-min-media__desc">' . $comment['desc'] . '</div>
                        <div class="komentar-iframe-min-comment-act">
                            <a href="javascript:void(0)" class="komentar-iframe-min-comment-bls btn-reply" data-parent="' . $comment['idcomment'] . '">Balas</a>
                        </div>
                        <div id="sub_comment_form_' . $comment['idcomment'] . '" class="visible-sub-comment"></div>';
            $commentHTML .= $this->getCommentReply($comment['idcomment']);
            $commentHTML .= '</div>';
            $commentHTML .= '</div>';
            $commentHTML .= '</div>';
        }
        return $commentHTML;
    }
    function getCommentReply($parentId = 0)
    {
        $commentQuery = $this->Mcomment->orderBy('id_comment', 'desc')->where(['idparent_comment' => $parentId])->findAll();
        $commentHTML = '';
        if ($commentQuery) :
            foreach ($commentQuery as $comment) {
                $commentHTML .= '
                <div class="komentar-iframe-min-list-content komentar-iframe-min-list-content--bordered">
                    <div class="komentar-iframe-min-list-content__item" id="cmt71550021">
                        <div class="komentar-iframe-min-media komentar-iframe-min-media--left komentar-iframe-min-media--image-circle">
                            <div class="komentar-iframe-min-media__image"><span class="komentar-iframe-min-ratiobox"><img src="' . getenv('urlassets') . 'default/default-user.jpg' . '" alt="image author - ' . getenv('urlassets') . 'default/default-user.jpg' . '" title="image author - ' . getenv('urlassets') . 'default/default-user.jpg' . '"></span></div>
                            <div class="komentar-iframe-min-media__text">
                                <div class="komentar-iframe-min-media__user">' . $comment["name_comment"] . ' </div>
                                <div class="komentar-iframe-min-media__date">' . time_elapsed_string($comment["created_at"]) . '</div>
                                <div class="komentar-iframe-min-media__desc">' . $comment["desc_comment"] . '</div>
                                <div class="komentar-iframe-min-comment-act">
                                    <a href="javascript:void(0)" class="komentar-iframe-min-comment-bls btn-reply" data-parent="' . $comment['id_comment'] . '">Balas</a>
                                </div>
                                <div id="sub_comment_form_' . $comment['id_comment'] . '" class="visible-sub-comment"></div>';
                $commentHTML .= $this->getCommentReply($comment["id_comment"]);
                $commentHTML .= '</div>';
                $commentHTML .= '</div>';
                $commentHTML .= '</div>';
                $commentHTML .= '</div>';
            }
        endif;
        return $commentHTML;
    }
    public function add()
    {
        $post = $this->request->getPost();
        $this->Mcomment->add($post);
        $resp = [
            'status' => 'success',
            'type' => 'message',
            'message' => '<div class="message-comment-result"><p class="comment-success-message"><i class="fas fa-check"></i>&nbsp;&nbsp;Komentar anda telah dikirim. Komentar akan diterbitkan setelah ditinjau oleh redaksi.</p></div>',
            'data' => $post
        ];
        echo json_encode($resp);
    }
    public function sub_comment()
    {
        $idcomment = cleanNumber($this->request->getPost('idcomment'));
        $data['data'] = $this->Mcomment->where('id_comment', $idcomment)->first();
        $resp = [
            'status' => 'success',
            'view' => view('comment/sub_comment', $data)
        ];
        echo json_encode($resp);
    }
}
