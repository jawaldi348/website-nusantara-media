<?php

namespace App\Models;

use CodeIgniter\Model;

class Mhome extends Model
{
    public function fetch_all()
    {
        $data['dataKategori'] = $this->fetch_all_kategori();
        $data['dataTerpopular'] = $this->fetch_all_content(['terpopular' => true, 'limit' => 10]);
        $data['dataHeadline'] = $this->fetch_all_content(['headline' => true, 'limit' => 4]);
        $data['dataTerkini'] = $this->fetch_all_content(['limit' => 6]);
        $data['dataTagpopuler'] = $this->fetch_all_tags();
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
                'url' => site_url('category/' . $row['slug_kategori']),
                'dataContent' => $this->fetch_all_content(['category' => true, 'idcat' => $row['id_kategori'], 'limit' => 6])
            ];
        }
        return $result;
    }
    public function fetch_all_content($array = [])
    {
        $this->builder = $this->db->table('posts');
        if (isset($array['category']) == true) :
            $this->builder->join('post_kategori', 'id_post=idpost_kategori');
            $this->builder->join('kategori_path', 'idkategori_kategori=kategori_path');
            $this->builder->where(['parent_path' => $array['idcat'], 'level_path' => 0]);
        endif;
        if (isset($array['tags']) == true) :
            $this->builder->join('post_tags', 'idpost_tags=id_post');
            $this->builder->where('slug_tags', $array['slug']);
        endif;
        if (isset($array['terpopular']) == true) :
            $this->builder->where('visit_post >', 0);
        endif;
        if (isset($array['headline']) == true) :
            $this->builder->where('status_headline', 1);
        endif;
        $this->builder->where(['status_publish' => 'publish', 'status_data' => 1]);
        if (isset($array['terpopular']) == true) :
            $this->builder->orderBy('visit_post', 'desc');
        else :
            $this->builder->orderBy('date_publish', 'desc');
        endif;
        if (isset($array['limit']) > 0) :
            $this->builder->limit($array['limit']);
        endif;
        $query = $this->builder->get()->getResultArray();

        $result = [];
        $rows = [];
        foreach ($query as $value) {
            $idpost = $value['id_post'];
            $date_publish = format_tglen_timestamp($value['date_publish']);
            $rows = [
                'title' => $value['title_post'],
                'slug' => $value['slug_post'],
                'summary' => $value['summary_post'],
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
                ->select('*,media.path_media as path,post_media.path_media as path_media_post')
                ->join('media', 'media.id_media=idmedia_media')
                ->orderBy('main_media', 'desc')
                ->getWhere(['idpost_media' => $idpost, 'post_media.type_media' => 'main', 'post_media.status_data' => 1])
                ->getResultArray();
            $result_main_media = [];
            foreach ($query_main_media as $row_main_media) {
                // if (isset($array['headline']) == true) :
                $path_media = getenv('urlassets') . $row_main_media['path_media_post'];
                // else :
                //     $path_media = getenv('urlassets') . $row_main_media['path'] . $row_main_media['name_ext_media'] . '_150.' . $row_main_media['ext_media'];
                // endif;
                $result_main_media[] = [
                    'title_media' => $row_main_media['title_media'],
                    'path_media' => $path_media,
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
    public function fetch_all_tags()
    {
        $sql = $this->db->table('tags')->limit(9)->orderBy('RAND()')->get()->getResultArray();
        $result = [];
        foreach ($sql as $row_tagpopuler) {
            $result[] = [
                'tag' => $row_tagpopuler['nama_tags'],
                'slug' => $row_tagpopuler['slug_tags'],
                'url' => site_url('tag/' . $row_tagpopuler['slug_tags'])
            ];
        }
        return $result;
    }
}
