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
    public function pedoman_media_siber()
    {
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['title'] = 'Pedoman Media Siber - ' . $data['config']['sitename'];
        return view('pages/pedoman', $data);
    }
}
