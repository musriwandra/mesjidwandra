<?php

namespace App\Controllers;

class quiz extends BaseController
{
// public function tampil() 
//     {
//        $kode = $this->request->getPost('kodebaju');
    //    $agenda = $this->request->getPost('jenisbaju'); 
    //    $transportasi = $this->request->getPost('hargabaju'); 
    //    $penginapan = $this->request->getPost('jumlah'); 
    //    $total = $this->request->getPost('total');
    //     echo "<center>kodebaju :$kode <br></center>"; 
    //     echo "<center>jenisbaju :$agenda <br></center>"; 
    //     echo "<center>hargabaju :$transportasi <br></center>";
    //     echo "<center>jumlah :$penginapan <br></center>";
    //     echo "<center>total :$total <br></center>"; 
         
    // }   


    public function simpan() 
    {

        $db = \Config\Database::connect();
        $data =[
                'kodesepeda'=>  $this->request->getPost('kodesepeda'),
                'jenissepeda'=>   $this->request->getPost('jenissepeda'),
                'hargasemua'=>  $this->request->getPost('hargasemua'), 
                'jumlahbeli'=>  $this->request->getPost('jumlahbeli'), 
                'hargasatuan'=>  $this->request->getPost('hargasatuan'),
               ];
        $simpan = $db->table('quiz')->insert($data);
        if ($simpan =  TRUE)
            {
                echo "<script>
                alert('data berhasil disimpan');
                window.location='/quiz/tampil';
                </script>";
            }else 
            {
                echo"<script>
                alert('data gagal disimpan');
                window.location='/quiz/entri';
                </script>";   
            }    
    }   
    public function entri() 
    {
        return view ('entri');
    }

    function tampil()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('quiz');
        $query = $builder->get();
        $data['sppdok'] = $query->getResultArray();
        return view('tampilquiz',$data);
    }
}