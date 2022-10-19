<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table            = 'tb_transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $returnType       = 'object';
    protected $allowedFields    = ['kwitansi','tanggal','deskripsi','ketJurnal'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function noKwitansi()
    {
        $number = $this->db->table('tb_transaksi')->select('RIGHT(tb_transaksi.kwitansi,4) as kwitansi', FALSE)
            ->orderBy('kwitansi','DESC')->limit(1)->get()->getRowArray();
    
            if($number == null){
                $no = 1;
            }else{
                $no = intval($number['kwitansi'])+1;
            }
            $nomor_kwitansi = str_pad($no,4,"0",STR_PAD_LEFT);
            return $nomor_kwitansi;
    }
}
