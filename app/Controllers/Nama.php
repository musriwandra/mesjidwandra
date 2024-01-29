<?php

namespace App\Controllers;

use App\Models\ModelNama;

class Nama extends BaseController
{
    public function index()
    {
        $model = new ModelNama();
        $data['nama'] = $model->getNama()->getResultArray();
        echo view('nama/v_nama', $data);
    }
    public function save()
    {
        $model = new ModelNama();
        $data = array(
            'id_nama' => $this->request->getPost('id'),
            'nama_siswa' => $this->request->getPost('namasiswa'),
            'alamat' => $this->request->getPost('alamat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'no_hp' => $this->request->getPost('no_hp'),
        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_nama.id_nama]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            print_r($this->request->getVar());
        }
        $model->insertData($data);
        return redirect()->to('/nama');
    }
    public function delete()
    {
        $model = new ModelNama();
        $id = $this->request->getPost('id');
        $model->deletenama($id);
        return redirect()->to('/nama/index');
    }
    function update()
    {
        $model = new ModelNama();
        $id = $this->request->getPost('id');
        $data = array(
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'alamat' => $this->request->getPost('alamat'),
            'jurusan' => $this->request->getPost('jurusan'),
            'no_hp' => $this->request->getPost('no_hp'),
        );
        $model->updatenama($data, $id);
        return redirect()->to('/nama/index');
    }
}
