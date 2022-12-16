<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun3Model;
use App\Models\TransaksiModel;
use App\Models\Akun2Model;
use App\Models\StatusModel;
use App\Models\NilaiModel;
use TCPDF;

class JurnalUmum extends BaseController
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
        $hasil =  $this->TransaksiModel->get_jurnalumum($tglawal,$tglakhir);

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
        ];

        return view('jurnalumum/index', $data);
    }
    public function cetak()
    {
        $tglawal = $this->request->getVar('tglawal')? $this->request->getVar('tglawal'): '';
        $tglakhir = $this->request->getVar('tglakhir') ? $this->request->getVar('tglakhir'): '';
        $hasil =  $this->TransaksiModel->get_jurnalumum($tglakhir,$tglawal);

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
            'tglakhir' =>$tglawal,
        ];

        return view('jurnalumum/cetakjupdf', $data);
    }
}
