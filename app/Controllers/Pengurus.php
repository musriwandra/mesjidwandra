<?php

namespace App\Controllers;

use App\Models\ModelPengurus;

class Pengurus extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {

            $userLevel = session()->get('level');

            if ($userLevel == 1) {
                $model = new ModelPengurus();
                $data['pengurus'] = $model->getPengurus()->getResultArray();
                echo view('pengurus/v_pengurus', $data);
            } else {
                echo "<script>alert('Akses Anda Di Batasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new ModelPengurus();
        $data = array(
            'id_pengurus' => $this->request->getPost('id'),
            'nama_pengurus' => $this->request->getPost('namapengurus'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('nohp'),
        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_pengurus.id_pengurus]',
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
        return redirect()->to('/pengurus');
    }
    public function delete()
    {
        $model = new ModelPengurus();
        $id = $this->request->getPost('id');
        $model->deletepengurus($id);
        return redirect()->to('/pengurus/index');
    }
    function update()
    {
        $model = new ModelPengurus();
        $id = $this->request->getPost('id');
        $data = array(
            'nama_pengurus' => $this->request->getPost('namapengurus'),
            'jabatan' => $this->request->getPost('jabatan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('nohp'),
        );
        $model->updatepengurus($data, $id);
        return redirect()->to('/pengurus/index');
    }
}
