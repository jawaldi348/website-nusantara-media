<?php

namespace App\Controllers;

class Tags extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
        $this->Mtags = new \App\Models\Mtags();
    }
    public function index($slug)
    {
        $data['config'] = $this->general->fetch_all('all');
        $data['data'] = $this->Mhome->fetch_all();
        $data['list'] = $this->Mtags->get_by_slug($data['config'], $slug);
        $data['title'] = $data['list']['titleHead'];
        if ($data['list']['status'] == true) :
            return view('tags/index', $data);
        else :
            return redirect()->to(site_url('errors/show404'));
        endif;
    }
}
