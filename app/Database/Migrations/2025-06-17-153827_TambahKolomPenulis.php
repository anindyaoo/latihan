<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahKolomPenulis extends Migration
{
    public function up()
    {
        $this->forge->addColumn('penulis', [
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'name', //nama kolom terakhir sebelumnya
            ],
            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'after' => 'email', //nama kolom terakhir sebelumnya
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('penulis', ['email', 'gender']);
    }
}
