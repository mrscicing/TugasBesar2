<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyesuaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyesuaian' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'       => true,
                'auto_increment' =>true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
            ],
            'nilai' => [
                'type'       => 'FLOAT',
                'constraint' => 12,
                'unsigned'       => true,
            ],
            'waktu' => [
                'type'       => 'INT',
                'constraint' => 12,
                'unsigned'       => true,
            ],
            'jumlah' => [
                'type'       => 'FLOAT',
                'constraint' => 12,
                'unsigned'       => true,
            ],
            'created_at'=>[
                'type' => 'DATETIME',
            ],
            'updated_at'=>[
                'type' => 'DATETIME',
            ],
            'deleted_at'=>[
                'type' => 'DATETIME',
            ]

        ]);
        $this->forge->addKey('id_penyesuaian', true);
        // $this->forge->addForeignKey('id_penyesuaian','tb_penyesuaian','id_penyesuaian');
        $this->forge->createTable('tb_penyesuaian');
    }

    public function down()
    {
        // $this->forge->dropForeignKey('id','tb_')
        $this->forge->dropTable('tb_penyesuaian');

    }
}
