<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function Beranda(): string
    {
        return view('welcome_message');
    }


    public function About_Us(): string
    {
        return view('welcome_message');
    }
}
