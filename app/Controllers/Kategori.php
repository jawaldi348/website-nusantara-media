<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
        $this->Mkategori = new \App\Models\Mkategori();
    }
    public function index($slug)
    {
        $data['config'] = $this->general->fetch_all('all');
        $data['data'] = $this->Mhome->fetch_all();
        $data['list'] = $this->Mkategori->get_by_slug($data['config'], $slug);
        $data['title'] = $data['list']['titleHead'];
        if ($data['list']['status'] == true) :
            return view('kategori/index', $data);
        else :
            return redirect()->to(site_url('errors/show404'));
        endif;
    }
}
