<?php

namespace App\Models;

use CodeIgniter\Model;

class Msearch extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();

        $this->Mhome = new \App\Models\Mhome();
    }
    public function fetch_search($search)
    {
        $data = [
            'search' => $search,
            'dataContent' => $this->Mhome->fetch_all_content(['formSearch' => true, 'search' => $search, 'limit' => 12]),
            'rekomendasi' => $this->Mhome->fetch_all_content(['random' => true, 'limit' => 16])
        ];
        return $data;
    }
}
