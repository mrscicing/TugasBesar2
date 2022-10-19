<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederStatus extends Seeder
{
    public function run()
    {
        $data = [
            
            ['status' => 'Penerimaan',
            ],
            ['status' => 'Pengeluaran',
            ],
            ['status' => 'Investasi Masuk',
            ],
            ['status' => 'Investasi Keluar',
            ],
            ['status' => 'Normal',
            ],
        
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tb_status')->insertBatch($data);
    }
}
