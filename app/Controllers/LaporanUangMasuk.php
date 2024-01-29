<?php

namespace App\Controllers;

use App\Models\ModelKasMasjid;

class Kasmasjid extends BaseController
{
    public function index()
    {
        $model = new ModelKasMasjid();
        $data['kas'] = $model->getLaporanUangMasuk()->getResultArray();
        echo view('kas/cetak_laporan', $data);
    }

    public function laporankasmasuk()
    {
        $model = new ModelKasMasjid();
        $data['data'] = $model->getLaporanUangMasuk()->getResultArray();
        echo view('kas/cetak_laporan', $data);
    }
    public function laporanperperiode()
    {
        echo view('kas/vlaporankasmasuk');
    }

    public function save()
    {
        $model = new ModelKasMasjid();
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_masuk' => $this->request->getPost('kas_masuk'),
            'kas_keluar' => 0,
            'jenis_kas' => $this->request->getPost('jeniskas'),
            'status' => 'Masuk',
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
            'kas_keluar' => $this->request->getPost('kas_keluar'),
            'jenis_kas' => $this->request->getPost('jenis_kas'),
            'status' => $this->request->getPost('status'),
        );
        $model->updatekasmasuk($data, $id);
        return redirect()->to('/kasmasjid/index');
    }
}
