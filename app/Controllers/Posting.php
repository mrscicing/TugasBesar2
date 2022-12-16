<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun3Model;
use App\Models\TransaksiModel;
use App\Models\Akun2Model;
use App\Models\StatusModel;
use App\Models\NilaiModel;
use TCPDF;

class Posting extends BaseController
{
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();  
        $this->Akun2Model = new Akun2Model();
        $this->Akun3Model = new Akun3Model();
        $this->StatusModel = new StatusModel();
        $this->NilaiModel = new NilaiModel();
    }
    
    public function index()
    {
        $tglawal = $this->request->getVar('tglawal')? $this->request->getVar('tglawal'): '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir'): '';
        $kode_akun3 = $this->request->getVar('kode_akun3') ? $this->request->getVar('kode_akun3'): '';
        $hasil =  $this->TransaksiModel->get_posting($tglawal,$tglakhir,$kode_akun3);


        $i=0;
        $temp1='';
        $temp2='';

        foreach($hasil as $row){
            $tgl = ($temp1 == $row->tanggal && $temp2 == $row->kwitansi) ? '' :$row->tanggal;
            $temp1 = $row->tanggal;
            $temp2 = $row->kwitansi;
            $hasil[$i]->tanggal=$tgl;
            $i++;
        }

        $data = [
            'title'=>'Data Akun',
            'transaksi'=>$hasil,
            'tglawal' =>$tglawal,
            'tglakhir' =>$tglakhir,
            'kode_akun3' =>$kode_akun3,
            'dtakun3' =>$this->Akun3Model->ambilrelasi(),
        ];

        return view('posting/index', $data);

    }
    public function cetak()
    {
        $tglawal = $this->request->getVar('tglawal')? $this->request->getVar('tglawal'): '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir'): '';
        $kode_akun3 = $this->request->getVar('kode_akun3') ? $this->request->getVar('kode_akun3'): '';
        $hasil =  $this->TransaksiModel->get_posting($tglakhir,$tglawal,$kode_akun3);

        $i=0;
        $temp1='';
        $temp2='';

        foreach($hasil as $row){
            $tgl = ($temp1 == $row->tanggal && $temp2 == $row->kwitansi) ? '' :$row->tanggal;
            $temp1 = $row->tanggal;
            $temp2 = $row->kwitansi;
            $hasil[$i]->tanggal=$tgl;
            $i++;
        }

        $data = [
            'title'=>'Data Akun',
            'transaksi'=>$hasil,
            'tglawal' =>$tglawal,
            'tglakhir' =>$tglakhir,
            'kode_akun3'=>$kode_akun3,
        ];

        return view('posting/cetakjupdf', $data);
    }
  
}
