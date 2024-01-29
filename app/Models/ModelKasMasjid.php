<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasMasjid extends Model
{
    public function getKasmasjid()
    {
        $builder = $this->db->table('tbl_kas_masjid');
        return $builder->get();
    }
    public function getDonatur()
    {
        $builder = $this->db->table('tbl_donatur');
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
    public function getLaporanperperiode($tgla, $tglb)
    {
        $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $b;
    }
    public function getLaporanperperiodeperjenis($tgla, $tglb, $jenis)
    {
        $b = $this->db->query("select * from tbl_kas_masjid where tanggal >= '$tgla' and tanggal <= '$tglb' and jenis_kas ='$jenis'");
        return $b;
    }
}
