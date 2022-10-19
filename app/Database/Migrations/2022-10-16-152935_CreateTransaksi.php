<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kwitansi' => [
                'type'       => 'VARCHAR',
                'constraint' => 4,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'deskripsi'=>[
                'type' => 'TEXT',
            ],
            'ketJurnal'=>[
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'create_at'=>[
                'type' => 'DATETIME',
            ],
            'updated_at'=>[
                'type' => 'DATETIME',
            ],
            'deleted_at'=>[
                'type' => 'DATETIME',
            ]
            
        ]);
        $this->forge->addKey('id_transaksi', true);
        // $this->forge->addForeignKey('kode_akun1','akun1s','id_akun1');
        $this->forge->createTable('tb_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_transaksi');
    }
}
