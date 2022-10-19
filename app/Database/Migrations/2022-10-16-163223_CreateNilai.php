<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNilai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_nilai' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'kode_akun3' => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
            ],
            'debit'=>[
                'type' => 'FLOAT',
                'constraint'     => 12,
                'unsigned'       => true,
            ],
            'kredit'=>[
                'type' => 'FLOAT',
                'constraint'     => 12,
                'unsigned'       => true,
            ],
            'id_status'=>[
                'type'           => 'INT',
                'constraint'     => 5,
                
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
        $this->forge->addKey('id_nilai', true);
        $this->forge->addForeignKey('id_transaksi','tb_transaksi','id_transaksi');
        $this->forge->createTable('tb_nilai');
    }

    public function down()
    {
        $this->forge->dropForeignKey('tb_nilai','tb_nilai_id_transaksi_foreign');
        $this->forge->dropTable('tb_nilai');
    }
}
