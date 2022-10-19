<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkun2 extends Seeder
{
    public function run()
    {
        $data = [
            
            ['kode_akun2' => 11,
            'nama_akun2' => 'aktiva lancar',
            'kode_akun1'=>12
        ],
        
        ['kode_akun2' => 12,
        'nama_akun2' => 'aktiva tetap',
        'kode_akun1'=>4
    ],
    
    ['kode_akun2' => 21,
    'nama_akun2' => 'utang jangka panjang',
    'kode_akun1'=>2
    
],
['kode_akun2' => 41,
'nama_akun2' => 'Pendapatan usaha',
'kode_akun1'=>2

],
['kode_akun2' => 42,
'nama_akun2' => 'Pendapatan Diluar Usaha',
'kode_akun1'=>2

],
['kode_akun2' => 51,
'nama_akun2' => 'Beban usaha',
'kode_akun1'=>2

],
['kode_akun2' => 21,
'nama_akun2' => 'Beban diluar Usaha',
'kode_akun1'=>2

],

    
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('akun2s')->insertBatch($data);
    }
}
