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
    public function get_jurnalumum($tglawal,$tglakhir)
    {
        $sql = $this->db->table('tb_nilai')
        -> join('tb_transaksi','tb_transaksi.id_transaksi=tb_nilai.id_transaksi')
        -> join('akun3s','akun3s.kode_akun3=tb_nilai.kode_akun3')
        -> orderBy('id_nilai');
        if($tglawal && $tglakhir){
            $sql->where('tanggal>=', $tglawal)->where('tanggal<=',$tglakhir);
        }
        return $sql->get()->getResultObject();
    }
    public function get_posting($tglawal,$tglakhir,$kode_akun3)
    {
        $sql = $this->db->table('tb_nilai')
        -> join('tb_transaksi','tb_transaksi.id_transaksi=tb_nilai.id_transaksi')
        -> join('akun3s','akun3s.kode_akun3=tb_nilai.kode_akun3')
        -> orderBy('akun3s.kode_akun3');
        if($tglawal && $tglakhir){
            $sql->where('tanggal >=', $tglawal)->where('tanggal <=',$tglakhir)->where('tb_nilai.kode_akun3=',$kode_akun3);

        }
        return $sql->get()->getResultObject();
        }

    public function get_jpenyesuaian($tglawal,$tglakhir)
    {
        $sql = $this->db->table('tb_nilaipenyesuaian')
        -> join('tb_penyesuaian','tb_penyesuaian.id_penyesuaian=tb_nilaipenyesuaian.id_penyesuaian')
        -> join('akun3s','akun3s.kode_akun3=tb_nilaipenyesuaian.kode_akun3')
        -> selectSum('debit','jumdebit')
        -> selectSum('kredit','jumkredit')
        -> select('akun3s.kode_akun3,akun3s.nama_akun3,tb_penyesuaian.tanggal')
        -> groupBy('akun3s.kode_akun3');
        if($tglawal && $tglakhir){
            $sql->where('tanggal>=', $tglawal)->where('tanggal<=',$tglakhir);
        }

        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_neracasaldo($tglawal,$tglakhir)
    {
        $sql = $this->db->table('tb_nilai')
        -> join('tb_transaksi','tb_transaksi.id_transaksi=tb_nilai.id_transaksi')
        -> join('akun3s','akun3s.kode_akun3=tb_nilai.kode_akun3')
        -> selectSum('debit','jumdebit')
        -> selectSum('kredit','jumkredit')
        -> select('akun3s.kode_akun3,akun3s.nama_akun3,tb_transaksi.tanggal, debit,kredit')
        -> groupBy('akun3s.kode_akun3');
        if($tglawal && $tglakhir){
            $sql->where('tanggal>=', $tglawal)->where('tanggal<=',$tglakhir);
        }

        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q1()
    {
        $sql = $this->db->table('tb_nilai')
        -> join('tb_transaksi','tb_transaksi.id_transaksi=tb_nilai.id_transaksi')
        -> join('akun3s','akun3s.kode_akun3=tb_nilai.kode_akun3')
        -> orderBy('akun3s.kode_akun3');

        $sql->where('tanggal>=', '2021-01-01')->where('tanggal<=','2021-03-31');
        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q2()
    {
        $sql = $this->db->table('tb_nilai')
        -> join('tb_transaksi','tb_transaksi.id_transaksi=tb_nilai.id_transaksi')
        -> join('akun3s','akun3s.kode_akun3=tb_nilai.kode_akun3')
        -> orderBy('akun3s.kode_akun3');

        $sql->where('tanggal>=', '2021-04-01')->where('tanggal<=','2021-06-30');
        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q3()
    {
        $sql = $this->db->table('tb_nilai')
        -> join('tb_transaksi','tb_transaksi.id_transaksi=tb_nilai.id_transaksi')
        -> join('akun3s','akun3s.kode_akun3=tb_nilai.kode_akun3')
        -> orderBy('akun3s.kode_akun3');

        $sql->where('tanggal>=', '2021-07-01')->where('tanggal<=','2021-09-30');
        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q4()
    {
        $sql = $this->db->table('tb_nilai')
        -> join('tb_transaksi','tb_transaksi.id_transaksi=tb_nilai.id_transaksi')
        -> join('akun3s','akun3s.kode_akun3=tb_nilai.kode_akun3')
        -> orderBy('akun3s.kode_akun3');

        $sql->where('tanggal>=', '2021-10-01')->where('tanggal<=','2021-12-31');
        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q1_2()
    {
        $sql = $this->db->table('tb_transaksi');

        $sql->where('tanggal>=', '2022-01-01')->where('tanggal<=','2022-03-31');
        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q2_2()
    {
        $sql = $this->db->table('tb_transaksi');

        $sql->where('tanggal>=', '2022-04-01')->where('tanggal<=','2022-06-30');
        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q3_2()
    {
        $sql = $this->db->table('tb_transaksi');

        $sql->where('tanggal>=', '2022-07-01')->where('tanggal<=','2022-09-30');
        $query = $sql->get()->getResultObject();
        return $query;
    }
    public function get_q4_2()
    {
        $sql = $this->db->table('tb_transaksi');

        $sql->where('tanggal>=', '2022-10-01')->where('tanggal<=','2022-12-31');
        $query = $sql->get()->getResultObject();
        return $query;
    }
}
