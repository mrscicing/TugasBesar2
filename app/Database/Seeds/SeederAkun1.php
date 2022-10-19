<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkun1 extends Seeder
{
    public function run()
    {
        $data = [
            
            ['kode_akun1' => 1,
            'nama_akun1' => 'awwii'],
            ['kode_akun1' => 2,
            'nama_akun1' => 'ari nur'],
            ['kode_akun1' => 3,
            'nama_akun1' => 'syifa nur'],
            ['kode_akun1' => 4,
            'nama_akun1' => 'ravi rinaldi']
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('akun1s')->insertBatch($data);
    }
}
