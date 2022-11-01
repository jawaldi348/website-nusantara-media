<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
    }
    public function contact()
    {
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['title'] = 'Kontak Kami - ' . $data['config']['sitename'];
        return view('pages/contact', $data);
    }
    public function about()
    {
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['title'] = 'Tentang Kami - ' . $data['config']['sitename'];
        return view('pages/about', $data);
    }
}
