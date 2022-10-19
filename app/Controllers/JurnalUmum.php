<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun3Model;
use App\Models\TransaksiModel;
use App\Models\Akun2Model;
use App\Models\StatusModel;
use App\Models\NilaiModel;

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
        $hasil =  $this->TransaksiModel->get_jurnalumum();

        $data = [
            'title'=>'Data Akun',
            'transaksi'=>$hasil
        ];
        return view('transaksi/index', $data);
    }
}
