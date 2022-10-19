<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkun3 extends Seeder
{
    public function run()
    {
        $data = [
            
            ['kode_akun3' => 1101,
            'nama_akun3' => 'kas',
            'kode_akun1' => 2,
            'kode_akun2' =>11
        ],
        ['kode_akun3' => 1102,
            'nama_akun3' => 'piutang',
            'kode_akun1' => 2,
            'kode_akun2' =>11
        ],
        ['kode_akun3' => 1103,
        'nama_akun3' => 'Perlengkapan kantor',
        'kode_akun1' => 2,
        'kode_akun2' =>11
    ],
    ['kode_akun3' => 1104,
            'nama_akun3' => 'sewa dibayar dimuka',
            'kode_akun1' => 2,
            'kode_akun2' =>11
        ],
        ['kode_akun3' => 1103,
            'nama_akun3' => 'asuransi dibayar dmuka',
            'kode_akun1' => 2,
            'kode_akun2' =>11
        ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('akun3s')->insertBatch($data);
    }
}
