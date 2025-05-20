<?php

namespace App\Controllers;

class Halaman extends BaseController
{
    public function Beranda(): string
    {
        return view('Halaman/Beranda');
    }

    public function About_Us(): string
    {
        return view('Halaman/About_Us');
    }
}
