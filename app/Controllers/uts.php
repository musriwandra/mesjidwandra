<?php

namespace App\Controllers;

class uts extends BaseController
{

    public function simpan() 
    {

        $db = \Config\Database::connect();
        $data =[
                'nobp'=>  $this->request->getPost('nobp'),
                'nama'=>   $this->request->getPost('nama'),
                'uts'=>  $this->request->getPost('uts'), 
                'uas'=>  $this->request->getPost('uas'), 
                'keterangan'=>  $this->request->getPost('keterangan'),
               ];
        $simpan = $db->table('uts')->insert($data);
        if ($simpan =  TRUE)
            {
                echo "<script>
                alert('data berhasil disimpan');
                window.location='/uts/tampil';
                </script>";
            }else 
            {
                echo"<script>
                alert('data gagal disimpan');
                window.location='/uts/entriuts';
                </script>";   
            }    
    }   
    public function entriuts() 
    {
        return view ('entriuts');
    }

    function tampil()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('uts');
        $query = $builder->get();
        $data['sppdok'] = $query->getResultArray();
        return view('tampiluts',$data);
    }
}