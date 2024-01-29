<?php

namespace App\Controllers;

use App\Models\ModelKasMasjid;

class Kasmasjid extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {

            $userLevel = session()->get('level');

            if ($userLevel == 1 ||  $userLevel == 3) {
                $model = new ModelKasMasjid();
                $data['kasmasjid'] = $model->getKasmasjid()->getResultArray();
                $data['data_donatur'] = $model->getDonatur()->getResult();
                echo view('kasmasjid/v_kasmasjid', $data);
            } else {
                echo "<script>alert('Akses Anda Di Batasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new ModelKasMasjid();
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'jenis_kas' => $this->request->getPost('jenis_kas'),
            'iddonaturmasjid' => $this->request->getPost('iddonatur'),
        );
        $model->insertData($data);
        return redirect()->to('/kasmasjid');
    }
    public function delete()
    {
        $model = new ModelKasMasjid();
        $id = $this->request->getPost('id');
        $model->deletekasmasjid($id);
        return redirect()->to('/kasmasjid/index');
    }
    function update()
    {
        $model = new ModelKasMasjid();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'jenis_kas' => $this->request->getPost('jenis_kas'),
        );
        $model->updatekasmasjid($data, $id);
        return redirect()->to('/kasmasjid/index');
    }
    public function laporankasmasuk()
    {
        $model = new ModelKasMasjid();
        $data['kas'] = $model->getLaporanUangMasuk()->getResultArray();
        echo view('kas/cetak_laporan', $data);
    }
    public function laporanperperiode()
    {
        echo view('kas/vlaporankasmasuk');
    }
    public function cetaklaporanperperiode()
    {
        $model = new ModelKasMasjid();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('kas/vcetaklaporanperperiode', $data);
    }
    public function laporanperperiodeperjeniskas()
    {
        echo view('kas/vlaporanperjeniskas');
    }

    public function cetaklaporanperperiodejeniskas()
    {
        $model = new Modelkasmasuk();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis = $this->request->getPost('jenis_kas');
        $query = $model->getLaporanperperiodeperjenis($tgla, $tglb, $jenis)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis' => $jenis,
            'data' => $query
        ];
        echo view('kas/v_cetaklaporanperperiodejeniskas', $data);
    }
}
