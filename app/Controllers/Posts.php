<?php

namespace App\Controllers;

class Posts extends BaseController
{
    public function __construct()
    {
        $this->visitor = new \App\Libraries\Visitor();

        $this->Mhome = new \App\Models\Mhome();
        $this->Mpost = new \App\Models\Mpost();
    }
    public function read($kategori, $tanggal, $idpost, $slug)
    {
        $this->visitor->track_visitor_content($idpost, 'post');
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['read'] = $this->Mpost->detail($data['config'], $kategori, $tanggal, $idpost, $slug);
        $data['title'] = $data['read']['titleHead'];
        if ($data['read']['status'] == true) :
            return view('post/read', $data);
        else :
            return redirect()->to(site_url('errors/show404'));
        endif;
    }
    public function load_more()
    {
        $post = $this->request->getPost();
        $sql = $this->Mhome->fetch_all_content(['limit' => $post['record_count'], 'start' => $post['page']]);

        $content = '<div class="row">';
        $i = 0;
        foreach ($sql as $terkini) {
            if ($i >= 2) {
                $content .= '</div><div class="row">';
                $i = 0;
            }
            $i++;
            $content .= '<div class="col-lg-6">';
            $content .= '<div class="position-relative mb-3">';
            $content .= '<div class="article-list-thumb thumb-loading">';
            $content .= '<a href="' . $terkini['url'] . '" class="article-list-thumb-link flex_ori" alt="' . $terkini['title'] . '">';
            $content .= '<img src="' . $terkini['mainMedia']['path_media'] . '" class="img-fluid w-100" alt="' . $terkini['mainMedia']['title_media'] . '" style="object-fit: cover;">';
            $content .= '</a>';
            $content .= '</div>';
            $content .= '<div class="position-relative px-0">';
            $content .= '<div class="article-list-info content_center">';
            $content .= '<span>';
            $content .= '<a href="' . $terkini['url'] . '" class="article-list-title" alt="' . $terkini['title'] . '">';
            $content .= '<h2>' . $terkini['title'] . '</h2>';
            $content .= '</a>';
            $content .= '<a href="' . $terkini['urlKategori'] . '" class="article-list-cate content_center" alt="' . $terkini['kategori'] . '">';
            $content .= '<h3>' . $terkini['kategori'] . '</h3>';
            $content .= '</a>';
            $content .= '<div class="article-list-date content_center">';
            $content .= '<span>' . $terkini['date_publish'] . '</span>';
            $content .= '</div>';
            $content .= '</span>';
            $content .= '</div>';
            $content .= '<div class="py-2 m-0">';
            $content .= '<div class="article-list-desc">' . $terkini['summary'] . '</div>';
            $content .= '</div>';
            $content .= '</div>';
            $content .= '</div>';
            $content .= '</div>';
        }
        $content .= '</div>';
        echo $content;
    }
}
