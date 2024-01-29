<?php

namespace App\Controllers;

use App\Models\ModelKask;
use App\Models\ModelKasKeluar1;
use App\Models\ModelKasMasuk;

class Kaskeluar1 extends BaseController
{
    //controler anakyatim

    public function anakyatim()
    {

        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new ModelKasKeluar1();
                $data['kaskeluar'] = $model->getKaskeluaranakyatim()->getResultArray();
                $data['data_anakyatim'] = $model->getAgendaanakyatim()->getResult();
                $data['anakyatim'] = $model->getTotalkasanakyatim()->getResultArray();
                $data['anakyatimk'] = $model->getTotalkasanakyatimkeluar()->getResultArray();
                echo view('kaskeluar/vkkanakyatim', $data);
            } else {
                echo "<script>alert('Akses Anda Di Batasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new ModelKasKeluar1();
        $jumlah = $this->request->getPost('kaskeluar');
        $sisakas = $this->request->getPost('sisakas');
        if ($jumlah > $sisakas) {
            echo "<script>alert(dana kurang); window.location.href='Kasmasjid/anakyatim'</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('ket'),
                'kas_keluar' => $this->request->getPost('kaskeluar'),
                'jenis_kas' => 'Anak Yatim',
                'id_agendamasjid' => $this->request->getPost('idagenda'),
            );
            $model->insertData($data);
            return redirect()->to('/kaskeluar1/anakyatim');
        }
    }
    function update()
    {

        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new ModelKasKeluar1();
                $id = $this->request->getPost('id');
                $data = array(
                    'tanggal' => $this->request->getPost('tanggal'),
                    'ket' => $this->request->getPost('ket'),
                    'kas_keluar' => $this->request->getPost('kas_keluar'),
                    'jenis_kas' => 'Anak Yatim',
                    'id_agendamasjid' => $this->request->getPost('idagenda'),
                );
                $model->updatekaskeluar($data, $id);
                return redirect()->to('/kaskeluar1/anakyatim');
            } else {
                echo "<script>alert('Akses Anda Di Batasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }
    public function delete()
    {
        $model = new ModelKasKeluar1();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar1/anakyatim');
    }


    // CONTROLLER KELUAR TPQ
    public function tpq()
    {

        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new ModelKasKeluar1();
                $data['kaskeluar'] = $model->getKaskeluartpq()->getResultArray();
                $data['data_tpq'] = $model->getAgendatpq()->getResult();
                $data['tpq'] = $model->getTotaltpq1()->getResultArray();
                $data['tpqk'] = $model->getTotaltpqkeluar()->getResultArray();
                echo view('kaskeluar/vkktpq', $data);
            } else {
                echo "<script>alert('Akses Anda Di Batasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }
    public function savetpq()
    {
        $model = new ModelKasKeluar1();
        $jumlah = $this->request->getPost('kaskeluar');
        $sisakas = $this->request->getPost('sisakas');
        if ($jumlah > $sisakas) {
            echo "<script>alert(dana kurang); window.location.href='Kaskeluar1/tpq'</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('keterangan'),
                'kas_keluar' => $this->request->getPost('kaskeluar'),
                'jenis_kas' => 'TPQ',
                'id_agendamasjid' => $this->request->getPost('idagenda'),
            );
            $model->insertDatatpq($data);
            return redirect()->to('/kaskeluar1/tpq');
        }
    }
    public function deletetpq()
    {
        $model = new ModelKasKeluar1();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar1/tpq');
    }
    function updatetpq()
    {
        $model = new ModelKasKeluar1();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'TPQ',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->updatekaskeluartpq($data, $id);
        return redirect()->to('/kaskeluar1/tpq');
    }
    // CONTROLLER KELUAR SOSIAL
    public function sosial()
    {

        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new ModelKasKeluar1();
                $data['kaskeluar'] = $model->getKaskeluarsosial()->getResultArray();
                $data['data_sosial'] = $model->getAgendasosial()->getResult();
                $data['sosial'] = $model->getTotalsosial1()->getResultArray();
                $data['sosialk'] = $model->getTotalsosialkeluar()->getResultArray();
                echo view('kaskeluar/vkksosial', $data);
            } else {
                echo "<script>alert('Akses Anda Di Batasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }
    public function savesosial()
    {
        $model = new ModelKasKeluar1();
        $jumlah = $this->request->getPost('kaskeluar');
        $sisakas = $this->request->getPost('sisakas');
        if ($jumlah > $sisakas) {
            echo "<script>alert(dana kurang); window.location.href='Kaskeluar1/sosial'</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'ket' => $this->request->getPost('keterangan'),
                'kas_keluar' => $this->request->getPost('kaskeluar'),
                'jenis_kas' => 'Sosial',
                'id_agendamasjid' => $this->request->getPost('idagenda'),
            );
            $model->insertDatasosial($data);
            return redirect()->to('/kaskeluar1/sosial');
        }
    }
    public function deletesosial()
    {
        $model = new ModelKasKeluar1();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar1/sosial');
    }
    function updatesosial()
    {
        $model = new ModelKasKeluar1();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'Sosial',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->updatekaskeluarsosial($data, $id);
        return redirect()->to('/kaskeluar1/sosial');
    }

    // CONTROLLER KELUAR MASJID
    public function mesjid()
    {

        if (session()->get('masuk') == true) {
            $userLevel = session()->get('level');
            if ($userLevel == 1 || $userLevel == 3) {
                $model = new ModelKasKeluar1();
                $data['kaskeluar'] = $model->getKaskeluarmesjid()->getResultArray();
                $data['data_mesjid'] = $model->getAgendamesjid()->getResult();
                $data['kasmasuk'] = $model->getTotalmesjid()->getResultArray();
                echo view('kaskeluar/vkkmasjid', $data);
            } else {
                echo "<script>alert('Akses Anda Di Batasi'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login,Silahkan Login Dulu'); window.location.href='/login';</script>";
        }
    }
    public function savemesjid()
    {
        $model = new ModelKasKeluar1();
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'Mesjid',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->insertDatamesjid($data);
        return redirect()->to('/kaskeluar1/mesjid');
    }
    public function deletemesjid()
    {
        $model = new ModelKasKeluar1();
        $id = $this->request->getPost('id');
        $model->deletekaskeluar($id);
        return redirect()->to('/kaskeluar1/mesjid');
    }
    function updatemesjid()
    {
        $model = new ModelKasKeluar1();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('keterangan'),
            'kas_keluar' => $this->request->getPost('kaskeluar'),
            'jenis_kas' => 'Mesjid',
            'id_agendamasjid' => $this->request->getPost('idagenda'),
        );
        $model->updatekaskeluarmesjid($data, $id);
        return redirect()->to('/kaskeluar1/mesjid');
    }
}
