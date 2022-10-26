<?php

namespace App\Models;

use CodeIgniter\Model;

class Mhome extends Model
{
    public function fetch_all()
    {
        $data['dataKategori'] = $this->fetch_all_kategori();
        return $data;
    }
    public function fetch_all_kategori()
    {
        $sql = $this->db->table('kategori')
            ->getWhere(['parent_kategori' => '0', 'status_kategori' => 1])
            ->getResultArray();
        foreach ($sql as $row) {
            $result[] = [
                'idkategori' => $row['id_kategori'],
                'kategori' => $row['nama_kategori'],
                'slug' => $row['slug_kategori'],
                'url' => site_url('category/' . $row['slug_kategori'])
            ];
        }
        return $result;
    }
}
