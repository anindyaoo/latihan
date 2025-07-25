<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    //create new method detail
    public function getBuku($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where('slug', $slug)->first();
    }
}
