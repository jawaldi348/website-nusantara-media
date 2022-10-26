<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
    }
    public function index()
    {
        $data['data'] = $this->Mhome->fetch_all();
        $data['config'] = $this->general->fetch_all('all');
        $data['title'] = $data['config']['sitename'] . ' - ' . $data['config']['sitedescription'];
        return view('layouts/home', $data);
    }
}
