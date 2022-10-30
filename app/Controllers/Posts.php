<?php

namespace App\Controllers;

class Posts extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
        $this->Mpost = new \App\Models\Mpost();
    }
    public function read($kategori, $tanggal, $idpost, $slug)
    {
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['read'] = $this->Mpost->detail($data['config'], $kategori, $tanggal, $idpost, $slug);
        $data['title'] = $data['read']['titleHead'];
        return view('post/read', $data);
    }
}
