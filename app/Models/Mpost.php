<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpost extends Model
{
    public function detail($config, $kategori, $tanggal, $idpost, $slug)
    {
        $sql = $this->db->table('posts')
            ->join('users_biodata', 'iduser_post=iduser_biodata')
            ->getWhere(['id_post' => $idpost, 'status_publish' => 'publish', 'status_data' => 1])
            ->getRowArray();
        if (isset($sql)) :
            $date_publish = format_timestamp($sql['date_publish']);
            $sql_kategori_akhir = $this->db->table('post_kategori')
                ->orderBy('level_path', 'desc')
                ->limit(1)
                ->join('kategori', 'idkategori_kategori=id_kategori')
                ->join('kategori_path', 'id_kategori=kategori_path')
                ->getWhere(['idpost_kategori' => $idpost])
                ->getRowArray();
            if ($sql_kategori_akhir['parent_kategori'] != '0') :
                $sql_parent_kategori = $this->db->table('kategori')->getWhere(['id_kategori' => $sql_kategori_akhir['parent_kategori']])->getRowArray();
                $parent_kategori = $sql_parent_kategori['nama_kategori'];
                $parent_slug_kategori = $sql_parent_kategori['slug_kategori'];
            else :
                $parent_kategori = $sql_kategori_akhir['nama_kategori'];
                $parent_slug_kategori = $sql_kategori_akhir['slug_kategori'];
            endif;
            $url = 'read/' . $sql_kategori_akhir['slug_kategori'] . '/' . format_tglen_timestamp($sql['date_publish']) . '/' . $sql['id_post'] . '/' . $sql['slug_post'];
            $data = [
                'status' => true,
                'titleHead' => $sql['title_post'] . ' - ' . $config['sitename'],
                'title' => $sql['title_post'],
                'slug' => $sql['slug_post'],
                'penulis' => $sql['penulis_post'] == '0' ? $sql['nama_lengkap'] : $sql['penulis_post'],
                'editor' => $sql['editor_post'] == '0' ? 'Admin' : $sql['editor_post'],
                'kategori' => $sql_kategori_akhir['nama_kategori'],
                'slugKategori' => $sql_kategori_akhir['slug_kategori'],
                'urlKategori' => site_url('category/' . $sql_kategori_akhir['slug_kategori']),
                'parentKategori' => $parent_kategori,
                'parentSlugKategori' => $parent_slug_kategori,
                'summary' => $sql['summary_post'],
                'url' => site_url($url),
                // 'date_publish' => format_singkat($date_publish['date']),
                'date_publish' => tanggal_indo_day($date_publish['date'], true) . ' | ' . time_timestamp($date_publish['time']),
                'date' => $date_publish['date'],
                'time' => $date_publish['time'],
                'datetime' => $date_publish['date'] . 'T' . $date_publish['time'],
                'userInput' => $sql['nama_lengkap']
            ];
            $sql_main_media = $this->db->table('post_media')
                ->select('*,post_media.path_media as urlmedia')
                ->join('media', 'idmedia_media=media.id_media')
                ->orderBy('main_media', 'desc')
                ->getWhere(['idpost_media' => $idpost, 'post_media.type_media' => 'main', 'post_media.status_data' => 1])
                ->getResultArray();
            $result_main_media = [];
            foreach ($sql_main_media as $row_main_media) {
                $result_main_media[] = [
                    'path_media' => getenv('urlassets') . $row_main_media['urlmedia'],
                    'main_media' => $row_main_media['main_media'],
                    'title_media' => $row_main_media['title_media'],
                ];
            }
            $data['dataMainMedia'] = $result_main_media;
            $key = array_search('1', array_column($data['dataMainMedia'], 'main_media'));
            $data['mainMedia'] = $data['dataMainMedia'][$key];
            $sql_desc = $this->db->table('post_section')
                ->orderBy('order_section', 'asc')
                ->getWhere(['idpost_section' => $idpost])
                ->getResultArray();
            $data_desc = [];
            $result_desc = [];
            foreach ($sql_desc as $row_desc) {
                if ($row_desc['idmedia_section'] != '0') :
                    if (!file_exists(getenv('dirassets') . $row_desc['path_section'])) :
                        $url = getenv('urlassets') . 'no-image.jpg';
                    else :
                        $url = getenv('urlassets') . $row_desc['path_section'];
                    endif;
                else :
                    $url = '';
                endif;
                $result_desc = [
                    'id' => $row_desc['id_section'],
                    // 'desc' => $row_desc['desc_section'],
                    'url' => $url
                ];
                preg_match_all("/\<\w[^<>]*?\>([^<>]+?\<\/\w+?\>)?|\<\/\w+?\>/i", $row_desc['desc_section'], $matches);

                $result_desc['desc'] = $matches[0];
                $data_desc[] = $result_desc;
            }
            $data['dataSection'] = $data_desc;
            // $result_content = [];
            // foreach ($sql_desc as $value_content) {
            //     $row_content = $value_content['desc_section'];
            //     $result_content[] = $row_content;
            // }
            // $data['dataContent'] = $result_content;
            // $data['dataDesc'] = join($data['dataContent']);
            $sql_tags = $this->db->table('post_tags')
                ->select('*,post_tags.slug_tags as tag_post')
                ->join('tags', 'idtag_tags=id_tags')
                ->getWhere(['idpost_tags' => $idpost, 'status_data' => '1'])
                ->getResultArray();
            $result_tags = [];
            foreach ($sql_tags as $row_tags) {
                $result_tags[] = [
                    'tag' => $row_tags['nama_tags'],
                    'slug' => $row_tags['tag_post'],
                    'url' => site_url('tags/' . $row_tags['tag_post'])
                ];
            }
            $data['dataTags'] = $result_tags;
            $row_tags = '';
            foreach ($sql_tags as $st) {
                $row_tags .= $st['nama_tags'] . ', ';
            }
            $data_tags = rtrim($row_tags, ', ');
            $data['tags'] = $data_tags;
        else :
            $data['status'] = false;
            $data['titleHead'] = $config['sitename'] . ' - ' . $config['sitedescription'];
            $data['message'] = 'Halaman tidak ditemukan';
        endif;
        return $data;
    }
}
