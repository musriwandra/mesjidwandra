<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNama extends Model
{
    public function getNama()
    {
        $builder = $this->db->table('tbl_nama');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_nama')->insert($data);
    }
    public function deletenama($id)
    {
        $query = $this->db->table('tbl_nama')->delete(array('id_nama' => $id));
    }
    public function updatenama($data, $id)
    {
        $query = $this->db->table('tbl_nama')->update($data, array('id_nama' => $id));
    }
}
