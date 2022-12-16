<?php

namespace App\Models;

use CodeIgniter\Model;

class RestapiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'rest_api';
    protected $primaryKey       = 'id';

    protected $allowedFields    = ['nama_akun','kode'];
}
