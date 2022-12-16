<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyesuaianModel extends Model
{
    protected $table            = 'tb_penyesuaian';
    protected $primaryKey       = 'id_penyesuaian';
    protected $returnType       = 'object';
    protected $allowedFields    = ['tanggal','deskripsi','nilai','waktu','jumlah'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
