<?php

namespace App\Controllers;

use App\Models\ModelDonatur;

class Donatur extends BaseController
{
    public function index()
    {
        if (session()->get('masuk') == true) {

            $userLevel = session()->get('level');

            if ($userLevel == 1) {
                $model = new ModelDonatur();
                $data['donatur'] = $model->getDonatur()->getResultArray();
                echo view('donatur/v_donatur', $data);
            } else {
                echo "<script>alert('Akses Anda Di tolak'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }

    public function save()
    {
        $model = new ModelDonatur();
        $data = array(
            'iddonatur' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp'),
        );

        $model->insertData($data);
        return redirect()->to('/donatur');
    }
    public function delete()
    {
        $model = new ModelDonatur();
        $id = $this->request->getPost('id');
        $model->deletedonatur($id);
        return redirect()->to('/donatur/index');
    }
    public function update()
    {
        $model = new ModelDonatur();
        $id = $this->request->getPost('id');
        $data = array(

            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp'),
        );
        $model->updatedonatur($data, $id);
        return redirect()->to('/donatur/index');
    }
}
