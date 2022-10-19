<?php

namespace App\Models;

use CodeIgniter\Model;

class Akun3Model extends Model
{

    protected $table            = 'akun3s';
    protected $primaryKey       = 'id_akun3';
    protected $returnType       = 'object';
    protected $allowedFields    = ['kode_akun3','kode_akun2','nama_akun3','kode_akun1'];

    function ambilrelasi()
    {
        $builder = $this->db->table('akun3s');
        $builder->join('akun1s','akun1s.id_akun1 = akun3s.kode_akun1');
        $builder->join('akun2s','akun2s.id_akun2 = akun3s.kode_akun2');
        $query = $builder->get();
        return $query->getResult();
    }
}
