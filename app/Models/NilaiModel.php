<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table            = 'tb_nilai';
    protected $primaryKey       = 'id_nilai';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_transaksi','kode_akun3','debit','kredit','id_status'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function ambilrelasiid($id)
    {
        $builder = $this->db->table('tb_nilai')->where("id_transaksi = $id")
        ->join('akun3s','akun3s.kode_akun3 = tb_nilai.kode_akun3')
        ->join('tb_status','tb_status.id_status = tb_nilai.id_status');
        $query = $builder->get();
        return $query->getResultObject();

    }
}
