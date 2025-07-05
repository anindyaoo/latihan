<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    //bisa dilihat pada vendor/codeigniter4/system/Model.php
    protected $table = 'penulis';
    protected $useTimestamps = true;
    protected $allowedfields = ['name', 'address'];

    public function search($kataKunci)
    {
        // $builder = $this->table('penulis');
        //$bulider->like('name', $kataKunci);

        //return $builder;

        return $this->table('penulis')->like('name', $kataKunci)->orlike(address, $kataKunci);
    }
}