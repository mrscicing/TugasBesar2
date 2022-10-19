<?php

namespace App\Models;

use App\Controllers\akun2;
use CodeIgniter\Model;

class Akun2Model extends Model
{
    protected $table            = 'akun2s';
    protected $primaryKey       = 'id_akun2';
    protected $returnType       = 'object';

    protected $allowedFields    = ['id_akun2','nama_akun2','kode_akun2','kode_akun1','nama_akun1'];

    function getdata()
    {
        $builder = $this->db->table('akun2s');
        $builder->join('akun1s','akun1s.id_akun1 = akun2s.kode_akun1');
        $query = $builder->get();
        return $query->getResult();
    }
}
