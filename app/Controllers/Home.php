<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['config'] = $this->general->fetch_all('all');
        $data['title'] = $data['config']['sitename'] . ' - ' . $data['config']['sitedescription'];
        return view('layouts/index', $data);
    }
}
