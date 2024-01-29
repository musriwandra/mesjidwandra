<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function index(): string
    {
        return view('profil');
    }

    public function profil(): string
    {    
        return view ('profil');
        
    }

   
}
