<?php

namespace App\Models\Settings;

use CodeIgniter\Model;

class Mgeneral extends Model
{
    public function fetch_all($params)
    {
        $this->builder = $this->db->table('settings');
        if ($params != 'all') {
            $this->builder->where(['name' => $params]);
        }
        $res = $this->builder->get();
        // $result = null;
        if ($params == 'all') {
            foreach ($res->getResult() as $re) {
                if ($re->name == 'logo' or $re->name == 'favicon') {
                    $result[$re->name] = $re->value == '' || !file_exists(getenv('dirassets') . $re->value) ? getenv('urlassets') . 'default/default-logo.png' : getenv('urlassets') . $re->value;
                } else {
                    $result[$re->name] = $re->value;
                }
            }
            // $result = (object)$result;
        } else {
            foreach ($res->getResult() as $re) {
                $result[] = $re->value;
            }
        }
        return $result;
    }
}
