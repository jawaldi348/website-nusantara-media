<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkategori extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();

        $this->Mhome = new \App\Models\Mhome();
    }
    public function get_by_slug($config, $slug)
    {
        $sql = $this->db->table('kategori')
            ->getWhere(['slug_kategori' => $slug])
            ->getRowArray();
        if (isset($sql)) :
            $data = [
                'status' => true,
                'titleHead' => $sql['nama_kategori'] . ' - ' . $config['sitename'],
                'kategori' => $sql['nama_kategori'],
                'slug' => $sql['slug_kategori'],
                'url' => site_url('category/' . $sql['slug_kategori']),
                'dataContent' => $this->Mhome->fetch_all_content(['category' => true, 'idcat' => $sql['id_kategori'], 'limit' => 6])
            ];
        else :
            $data['status'] = false;
            $data['titleHead'] = $config['sitename'] . ' - ' . $config['sitedescription'];
            $data['message'] = 'Halaman tidak ditemukan';
        endif;
        return $data;
    }
}
