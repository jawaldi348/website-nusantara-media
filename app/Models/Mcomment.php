<?php

namespace App\Models;

use CodeIgniter\Model;

class Mcomment extends Model
{
    protected $table      = 'post_comments';
    protected $primaryKey = 'id_comment';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['idparent_comment', 'idpost_comment', 'iduser_comment', 'name_comment', 'email_comment', 'desc_comment', 'ip_address', 'like_comment', 'status_comment', 'created_at'];

    public function add($post)
    {
        $data = [
            'idpost_comment' => cleanNumber($post['idpost']),
            'name_comment' => $post['nama'],
            'email_comment' => $post['email'],
            'desc_comment' => $post['message'],
            'status_comment' => 0,
            'ip_address' => 0
        ];
        if (empty($post['idparent'])) :
            $data['idparent_comment'] = 0;
        else :
            $data['idparent_comment'] = $post['idparent'];
        endif;
        if (!empty($data['idpost_comment']) && !empty($data['desc_comment'])) {
            $data['iduser_comment'] = 0;
            $ip = getIPAddress();
            if (!empty($ip)) {
                $data['ip_address'] = $ip;
            }
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('post_comments')->insert($data);
            // $idrole = $this->db->insertID();

            // if ($this->builderComments->insert($data)) {
            //     $lastId = $this->db->insertID();
            //     helperSetCookie('added_comment_id_' . $lastId, 1);
            // }
        }
    }
}
