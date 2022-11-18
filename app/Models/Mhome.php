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
        $data['dataTerkini'] = $this->fetch_all_content(['limit' => 6, 'start' => 0]);
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
        $start = isset($array['start']) ? $array['start'] : 0;
        $this->builder->limit($array['limit'], $start);
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
            if ($rows['dataMainMedia'] != null) :
                $key = array_search('1', array_column($rows['dataMainMedia'], 'main_media'));
                $rows['mainMedia'] = $rows['dataMainMedia'][$key];
            else :
                $rows['mainMedia'] = [
                    'title_media' => 'Gambar tidak ada',
                    'path_media' => getenv('urlassets') . 'no-image.jpg',
                    'main_media' => 1,
                ];
            endif;
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
    public function get_home()
    {
        $sql_headline = $this->db->table('posts')
            ->orderBy('date_publish', 'desc')
            ->limit(4)
            ->getWhere(['status_headline' => 1, 'status_publish' => 'publish', 'status_data' => 1])->getResultArray();
        $data_headline = [];
        $result_headline = [];
        foreach ($sql_headline as $row_headline) {
            $idpost = $row_headline['id_post'];
            $sql_kategori_akhir = $this->db->table('posts')
                ->orderBy('level_path', 'asc')
                ->limit(1)
                ->join('post_kategori', 'id_post=idpost_kategori')
                ->join('kategori_path', 'idkategori_kategori=kategori_path')
                ->join('kategori', 'parent_path=id_kategori')
                ->getWhere(['idpost_kategori' => $idpost])
                ->getRowArray();
            $date_publish = format_tglen_timestamp($row_headline['date_publish']);
            $result_headline = [
                'title' => $row_headline['title_post'],
                'slug' => $row_headline['slug_post'],
                'kategori' => $sql_kategori_akhir['nama_kategori'],
                'slugKategori' => $sql_kategori_akhir['slug_kategori'],
                'url' => site_url('read/' . $sql_kategori_akhir['slug_kategori'] . '/' . format_tglen_timestamp($row_headline['date_publish']) . '/' . $row_headline['id_post'] . '/' . $row_headline['slug_post']),
                'date_publish' => format_singkat($date_publish)
            ];
            $sql_main_media = $this->db->table('post_media')
                ->orderBy('main_media', 'desc')
                ->getWhere(['idpost_media' => $idpost, 'type_media' => 'main', 'status_data' => 1])
                ->getResultArray();
            $result_main_media = [];
            foreach ($sql_main_media as $row_main_media) {
                $result_main_media[] = [
                    'path_media' => getenv('urlassets') . $row_main_media['path_media'],
                    'main_media' => $row_main_media['main_media'],
                ];
            }
            $result_headline['dataMainMedia'] = $result_main_media;
            $key = array_search('1', array_column($result_headline['dataMainMedia'], 'main_media'));
            $result_headline['mainMedia'] = $result_headline['dataMainMedia'][$key];
            $data_headline[] = $result_headline;
        }
        $data['dataHeadline'] = $data_headline;
        $sql_terpopular = $this->db->table('posts')
            ->orderBy('visit_post', 'desc')
            ->limit(10)
            ->getWhere(['visit_post >' => 0, 'status_publish' => 'publish', 'status_data' => 1])->getResultArray();
        $data_terpopular = [];
        $result_terpopular = [];
        foreach ($sql_terpopular as $row_terpopular) {
            $idpost = $row_terpopular['id_post'];
            $sql_kategori_akhir = $this->db->table('post_kategori')
                ->orderBy('level_path', 'desc')
                ->limit(1)
                ->join('kategori', 'idkategori_kategori=id_kategori')
                ->join('kategori_path', 'id_kategori=kategori_path')
                ->getWhere(['idpost_kategori' => $idpost])
                ->getRowArray();
            $date_publish = format_tglen_timestamp($row_terpopular['date_publish']);
            $result_terpopular = [
                'title' => $row_terpopular['title_post'],
                'slug' => $row_terpopular['slug_post'],
                'kategori' => $sql_kategori_akhir['nama_kategori'],
                'slugKategori' => $sql_kategori_akhir['slug_kategori'],
                'summary' => $row_terpopular['summary_post'],
                'url' => site_url('read/' . $sql_kategori_akhir['slug_kategori'] . '/' . format_tglen_timestamp($row_terpopular['date_publish']) . '/' . $row_terpopular['id_post'] . '/' . $row_terpopular['slug_post']),
                'date_publish' => format_singkat($date_publish)
            ];
            $sql_main_media = $this->db->table('post_media')
                ->orderBy('main_media', 'desc')
                ->getWhere(['idpost_media' => $idpost, 'type_media' => 'main', 'status_data' => 1])
                ->getResultArray();
            $result_main_media = [];
            foreach ($sql_main_media as $row_main_media) {
                $result_main_media[] = [
                    'path_media' => getenv('urlassets') . $row_main_media['path_media'],
                    'main_media' => $row_main_media['main_media'],
                ];
            }
            $result_terpopular['dataMainMedia'] = $result_main_media;
            $key = array_search('1', array_column($result_terpopular['dataMainMedia'], 'main_media'));
            $result_terpopular['mainMedia'] = $result_terpopular['dataMainMedia'][$key];
            $data_terpopular[] = $result_terpopular;
        }
        $data['dataTerpopular'] = $data_terpopular;
        $sql_terkini = $this->db->table('posts')
            ->orderBy('date_publish', 'desc')
            ->getWhere(['status_publish' => 'publish', 'status_data' => 1])
            ->getResultArray();
        $data_terkini = [];
        $result_terkini = [];
        foreach ($sql_terkini as $row_terkini) {
            $idpost = $row_terkini['id_post'];
            $sql_kategori_akhir = $this->db->table('post_kategori')
                ->orderBy('level_path', 'desc')
                ->limit(1)
                ->join('kategori', 'idkategori_kategori=id_kategori')
                ->join('kategori_path', 'id_kategori=kategori_path')
                ->getWhere(['idpost_kategori' => $idpost])
                ->getRowArray();
            $date_publish = format_tglen_timestamp($row_terkini['date_publish']);
            $result_terkini = [
                'title' => $row_terkini['title_post'],
                'slug' => $row_terkini['slug_post'],
                'kategori' => $sql_kategori_akhir['nama_kategori'],
                'slugKategori' => $sql_kategori_akhir['slug_kategori'],
                'summary' => $row_terkini['summary_post'],
                'url' => site_url('read/' . $sql_kategori_akhir['slug_kategori'] . '/' . format_tglen_timestamp($row_terkini['date_publish']) . '/' . $row_terkini['id_post'] . '/' . $row_terkini['slug_post']),
                'date_publish' => format_singkat($date_publish)
            ];
            $sql_main_media = $this->db->table('post_media')
                ->orderBy('main_media', 'desc')
                ->getWhere(['idpost_media' => $idpost, 'type_media' => 'main', 'status_data' => 1])
                ->getResultArray();
            $result_main_media = [];
            foreach ($sql_main_media as $row_main_media) {
                $result_main_media[] = [
                    'path_media' => getenv('urlassets') . $row_main_media['path_media'],
                    'main_media' => $row_main_media['main_media'],
                ];
            }
            $result_terkini['dataMainMedia'] = $result_main_media;
            $key = array_search('1', array_column($result_terkini['dataMainMedia'], 'main_media'));
            $result_terkini['mainMedia'] = $result_terkini['dataMainMedia'][$key];
            $data_terkini[] = $result_terkini;
        }
        $data['dataTerkini'] = $data_terkini;
        $sql_kategori = $this->db->table('kategori')->getWhere(['parent_kategori' => '0', 'status_kategori' => 1])->getResultArray();
        $data_kategori = [];
        $result_kategori = [];
        foreach ($sql_kategori as $row_kategori) {
            $result_kategori = [
                'idkategori' => $row_kategori['id_kategori'],
                'kategori' => $row_kategori['nama_kategori'],
                'slug' => $row_kategori['slug_kategori']
            ];
            $sql_postingan = $this->db->table('posts')
                ->groupBy('id_post')
                ->join('post_kategori', 'id_post=idpost_kategori')
                ->join('kategori_path', 'idkategori_kategori=kategori_path')
                ->orderBy('date_publish', 'desc')
                ->getWhere(['parent_path' => $row_kategori['id_kategori'], 'level_path' => 0, 'status_publish' => 'publish', 'status_data' => 1])
                ->getResultArray();
            $data_postingan = [];
            $result_postingan = [];
            foreach ($sql_postingan as $row_postingan) {
                $idpost = $row_postingan['id_post'];
                $sql_kategori_akhir = $this->db->table('post_kategori')
                    ->orderBy('level_path', 'desc')
                    ->limit(1)
                    ->join('kategori', 'idkategori_kategori=id_kategori')
                    ->join('kategori_path', 'id_kategori=kategori_path')
                    ->getWhere(['idpost_kategori' => $idpost])
                    ->getRowArray();
                $date_publish = format_tglen_timestamp($row_postingan['date_publish']);
                $result_postingan = [
                    'title' => $row_postingan['title_post'],
                    'slug' => $row_postingan['slug_post'],
                    'kategori' => $sql_kategori_akhir['nama_kategori'],
                    'slugKategori' => $sql_kategori_akhir['slug_kategori'],
                    'summary' => $row_postingan['summary_post'],
                    'url' => site_url('read/' . $sql_kategori_akhir['slug_kategori'] . '/' . format_tglen_timestamp($row_postingan['date_publish']) . '/' . $row_postingan['id_post'] . '/' . $row_postingan['slug_post']),
                    'date_publish' => format_singkat($date_publish)
                ];

                $sql_main_media = $this->db->table('post_media')
                    ->orderBy('main_media', 'desc')
                    ->getWhere(['idpost_media' => $idpost, 'type_media' => 'main', 'status_data' => 1])
                    ->getResultArray();
                $result_main_media = [];
                foreach ($sql_main_media as $row_main_media) {
                    $result_main_media[] = [
                        'path_media' => getenv('urlassets') . $row_main_media['path_media'],
                        'main_media' => $row_main_media['main_media'],
                    ];
                }
                $result_postingan['dataMainMedia'] = $result_main_media;
                $key = array_search('1', array_column($result_postingan['dataMainMedia'], 'main_media'));
                $result_postingan['mainMedia'] = $result_postingan['dataMainMedia'][$key];
                $data_postingan[] = $result_postingan;
            }
            $result_kategori['dataPostingan'] = $data_postingan;
            $data_kategori[] = $result_kategori;
        }
        $data['dataKategori'] = $data_kategori;
        $sql_tagpopuler = $this->db->table('tags')->limit(9)->orderBy('RAND()')->get()->getResultArray();
        $result_tagpopuler = [];
        foreach ($sql_tagpopuler as $row_tagpopuler) {
            $result_tagpopuler[] = [
                'tag' => $row_tagpopuler['nama_tags'],
                'slug' => $row_tagpopuler['slug_tags'],
                'url' => site_url('tags/' . $row_tagpopuler['slug_tags'])
            ];
        }
        $data['dataTagpopuler'] = $result_tagpopuler;
        return $data;
    }
}
