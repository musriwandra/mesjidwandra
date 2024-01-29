<?php

namespace App\Controllers;

use App\Models\ModelKask;

class kaskeluar extends BaseController
{

    public function index()
    {
        $model = new ModelKask();
        $data['kask'] = $model->getkask()->getResultArray();
        echo view('kaskeluar/v_kask', $data);
    }

    public function cetaklaporanperperiode()
    {
        $model = new ModelKask();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('kaskeluar/vcetaklaporanperperiode', $data);
    }

    public function cetaklaporanperperiodeperjeniskas()
    {
        $model = new ModelKask();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis = $this->request->getPost('jenis_kas');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis' => $jenis,
            'data' => $query
        ];
        echo view('kaskeluar/v_cetaklaporanperperiodeperjeniskask', $data);
    }

    public function laporanperperiode()
    {

        echo view('kaskeluar/vlaporankaskeluar');
    }

    public function laporanperjenis()
    {

        echo view('kask/vlaporanperjeniskas');
    }

    public function laporankaskeluar()
    {

        $model = new ModelKask();
        $data['data'] = $model->getLaporanUangkeluar()->getResultArray();
        echo view('kaskeluar/cetak_laporan', $data);
    }

    public function save()
    {
        $model = new ModelKask();
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'jenis_kas' => $this->request->getPost('jenis_kas'),
            'status' => 'keluar'
        );

        $model->insertData($data);
        return redirect()->to('/kaskeluar');
    }

    function update()
    {
        $model = new ModelKask();

        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => 0,
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'jenis_kas' => $this->request->getPost('jenis_kas'),
            'status' => 'keluar'
        );
        $model->updatekask($data, $id);
        return redirect()->to('/kaskeluar/index');
    }
    public function delete()
    {
        $model = new ModelKask();
        $id = $this->request->getPost('id');
        $model->deletekask($id);
        return redirect()->to('/kaskeluar/index');
    }
}
