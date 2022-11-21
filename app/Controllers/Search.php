<?php

namespace App\Controllers;

class Search extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
        $this->Msearch = new \App\Models\Msearch();
    }
    public function index()
    {
        $search = $this->request->getVar('search');
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['title'] = 'Hasil Pencarian ' . $search;
        $data['search'] = $this->Msearch->fetch_search($search);
        return view('search/index', $data);
    }
}
