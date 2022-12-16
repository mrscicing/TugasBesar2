<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Controllers\BaseController;

class Chart extends BaseController
{
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $builder = $this->db->table('akun1s');
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM akun1s");
        $result = $query->getResult();
        $data = [
            'title'=>'Data Akun',
            'akun1'=>$result,
            'q1'=>$this->TransaksiModel->get_q1(),
            'q2'=>$this->TransaksiModel->get_q2(),
            'q3'=>$this->TransaksiModel->get_q3(),
            'q4'=>$this->TransaksiModel->get_q4(),
            'q1_2'=>$this->TransaksiModel->get_q1_2(),
            'q2_2'=>$this->TransaksiModel->get_q2_2(),
            'q3_2'=>$this->TransaksiModel->get_q3_2(),
            'q4_2'=>$this->TransaksiModel->get_q4_2(),
            
        ];
        return view('chart/index copy',$data);
    }
}
