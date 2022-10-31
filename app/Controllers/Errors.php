<?php

namespace App\Controllers;

class Errors extends BaseController
{
    public function __construct()
    {
        $this->Mhome = new \App\Models\Mhome();
    }
    public function show404()
    {
        $this->response->setStatusCode(404);
        $data['config'] = $this->general->fetch_all('all');
        $data['data'] = $this->Mhome->fetch_all();
        $data['title'] = $data['config']['sitename'] . ' - ' . $data['config']['sitedescription'];
        return view('errors/404', $data);
    }
}
