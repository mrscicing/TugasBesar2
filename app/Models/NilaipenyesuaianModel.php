<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaipenyesuaianModel extends Model
{
    protected $table            = 'tb_nilaipenyesuaian';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';

    protected $allowedFields    = ['id_penyesuaian','kode_akun3','debit','kredit','id_status'];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function ambilrelasiid($id)
    {
        $builder = $this->db->table('tb_nilaipenyesuaian')->where("id_penyesuaian = $id")
        ->join('akun3s','akun3s.kode_akun3 = tb_nilaipenyesuaian.kode_akun3')
        ->join('tb_status','tb_status.id_status = tb_nilaipenyesuaian.id_status');
        $query = $builder->get();
        return $query->getResultObject();

    }
}
