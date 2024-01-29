<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKask extends Model
{

    public function getKask()
    {
        $builder = $this->db->table('tbl_kas_masjid')->where('status="keluar"');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_kas_masjid')->insert($data);
    }

    public function updateKask($data, $id)
    {
        $query = $this->db->table('tbl_kas_masjid')->update($data, array('id_kas_masjid' => $id));
    }
    public function deleteKask($id)
    {
        $query = $this->db->table('tbl_kas_masjid')->delete(array('id_kas_masjid' => $id));
        return $query;
    }

    public function getLaporanUangkeluar()
    {
        $builder = $this->db->table('tbl_kas_masjid');
        return $builder->get();
    }
    public function getLaporanperperiode($tgla, $tglb)
    {

        $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $b;
    }
    public function getLaporanperperiodeperjenis($tgla, $tglb, $jenis)
    {

        $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <= '$tglb' and  jenis_kas='$jenis'");
        return $b;
    }
}
