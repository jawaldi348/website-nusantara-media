<?php

namespace App\Controllers;

class Comment extends BaseController
{
    public function __construct()
    {
        $this->Mcomment = new \App\Models\Mcomment();
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
}
