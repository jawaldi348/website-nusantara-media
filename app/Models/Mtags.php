<?php

namespace App\Models;

use CodeIgniter\Model;

class Mtags extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();

        $this->Mhome = new \App\Models\Mhome();
    }
    public function get_by_slug($config, $slug)
    {
        $sql = $this->db->table('tags')
            ->getWhere(['slug_tags' => $slug])
            ->getRowArray();
        if (isset($sql)) :
            $data = [
                'status' => true,
                'titleHead' => $sql['nama_tags'] . ' - ' . $config['sitename'],
                'tag' => $sql['nama_tags'],
                'slug' => $sql['slug_tags'],
                'url' => site_url('tag/' . $sql['slug_tags']),
                'dataContent' => $this->Mhome->fetch_all_content(['tags' => true, 'slug' => $sql['slug_tags'], 'limit' => 6]),
            ];
        else :
            $data['status'] = false;
            $data['titleHead'] = $config['sitename'] . ' - ' . $config['sitedescription'];
            $data['message'] = 'Halaman tidak ditemukan';
        endif;
        return $data;
    }
}
