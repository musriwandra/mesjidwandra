<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUangMasuk extends Model
{
    public function getKasmasjid()
    {
        $builder = $this->db->table('tbl_kas_masjid');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
    }
    public function deletekasmasjid($id)
    {
        $query = $this->db->table('tbl_kas_masjid')->delete(array('id_kas_masjid' => $id));
    }
    public function getLaporanUangMasuk()
    {
        $builder = $this->db->table('tbl_kas_masjid');
        return $builder->get();
    }
}
