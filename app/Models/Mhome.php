<?php

namespace App\Models;

use CodeIgniter\Model;

class Mhome extends Model
{
    public function fetch_all()
    {
        $data['dataKategori'] = $this->fetch_all_kategori();
        $data['dataHeadline'] = $this->fetch_all_content();
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
    public function fetch_all_content()
    {
        $this->builder = $this->db->table('posts');
        $this->builder->where('status_headline', 1);
        $this->builder->where(['status_publish' => 'publish', 'status_data' => 1]);
        $this->builder->orderBy('date_publish', 'desc');
        $this->builder->limit(4);
        $query = $this->builder->get()->getResultArray();

        $result = [];
        $rows = [];
        foreach ($query as $value) {
            $idpost = $value['id_post'];
            $date_publish = format_tglen_timestamp($value['date_publish']);
            $rows = [
                'title' => $value['title_post'],
                'slug' => $value['slug_post'],
                'date_publish' => format_singkat($date_publish)
            ];
            $result_kategori = $this->db->table('posts')
                ->orderBy('level_path', 'asc')
                ->limit(1)
                ->join('post_kategori', 'id_post=idpost_kategori')
                ->join('kategori_path', 'idkategori_kategori=kategori_path')
                ->join('kategori', 'parent_path=id_kategori')
                ->getWhere(['idpost_kategori' => $idpost])
                ->getRowArray();
            $rows['url'] = site_url('read/' . $result_kategori['slug_kategori'] . '/' . format_tglen_timestamp($value['date_publish']) . '/' . $value['id_post'] . '/' . $value['slug_post']);
            $rows['kategori'] = $result_kategori['nama_kategori'];
            $rows['slugKategori'] = $result_kategori['slug_kategori'];
            $rows['urlKategori'] = site_url('category/' . $result_kategori['slug_kategori']);
            $query_main_media = $this->db->table('post_media')
                ->select('*,post_media.path_media as path_media_post')
                ->join('media', 'media.id_media=idmedia_media')
                ->orderBy('main_media', 'desc')
                ->getWhere(['idpost_media' => $idpost, 'post_media.type_media' => 'main', 'post_media.status_data' => 1])
                ->getResultArray();
            $result_main_media = [];
            foreach ($query_main_media as $row_main_media) {
                $result_main_media[] = [
                    'title_media' => $row_main_media['title_media'],
                    'path_media' => getenv('urlassets') . $row_main_media['path_media_post'],
                    'main_media' => $row_main_media['main_media'],
                ];
            }
            $rows['dataMainMedia'] = $result_main_media;
            $key = array_search('1', array_column($rows['dataMainMedia'], 'main_media'));
            $rows['mainMedia'] = $rows['dataMainMedia'][$key];
            $result[] = $rows;
        }
        return $result;
    }
}
