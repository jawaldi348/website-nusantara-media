<?php

namespace App\Controllers;

class Indeks extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
    }
    public function index()
    {
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['title'] = 'Indeks Kumpulan Berita Nusantaramedia.co.id - ' . $data['config']['sitedescription'];
        return view('indeks/index', $data);
    }
}
