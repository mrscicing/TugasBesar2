<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Akun3Model;
use App\Models\TransaksiModel;
use App\Models\Akun2Model;
use App\Models\StatusModel;
use App\Models\NilaiModel;
use App\Models\NilaipenyesuaianModel;
use App\Models\PenyesuaianModel;
class Penyesuaian extends BaseController
{
    public function __construct()
    {
        $this->NilaipenyesuaianModel = new NilaipenyesuaianModel();
        $this->PenyesuaianModel = new PenyesuaianModel();
        $this->TransaksiModel = new TransaksiModel();  
        $this->Akun2Model = new Akun2Model();
        $this->Akun3Model = new Akun3Model();
        $this->StatusModel = new StatusModel();
        $this->NilaiModel = new NilaiModel();

    }
    public function index()
    {
        $builder = $this->db->table('tb_penyesuaian');
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM tb_penyesuaian");
        $result = $query->getResult();
        // $hasil =  $this->TransaksiModel->ambilrelasi();

        $data = [
            'title'=>'Data Akun',
            'penyesuaian'=>$result
        ];
        return view('penyesuaian/index',$data);
    }
    public function add()
    {
        // $builder = $this->db->table("akun1s");
        // $query = $builder->get();
        // $query = $this->db->query("SELECT * FROM akun1s");
        // $result = $query->getResult();
        // $hasil = $this->Akun2Model->findall();
        $data=[
            // 'transaksip'=>$hasil,
            // 'transaksi' => $result,
            'title'=>'Transaksi'
        ];
        return view('penyesuaian/addakun',$data);
    }
    public function save()
    {
      
        $data = $this->request->getPost();
        $data = [
          
            'tanggal' => $this->request->getVar('tanggalx'),
            'nilai' => $this->request->getVar('nilaix'),
            'deskripsi' => $this->request->getVar('deskripsix'),
            'waktu' => $this->request->getVar('waktux'),
            'jumlah' => $this->request->getVar('jumlahx'),
        ];
        $this->db->table('tb_penyesuaian')->insert($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');

        $id_penyesuaian = $this->PenyesuaianModel->insertID();
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        for($i =0;$i<count($kode_akun3); $i++){
            $data2 [] = [
                'id_penyesuaian' => $id_penyesuaian,
                'kode_akun3' => $kode_akun3[$i],
                'debit' => $debit[$i],
                'kredit'=> $kredit[$i],
                'id_status' => $id_status[$i],
            ];
        }

        $this->NilaipenyesuaianModel->insertBatch($data2);

        return redirect()->to('penyesuaian/add')->with('success','Data Berhasil Disimpan');
    }
    public function delete($id)
    {
        $this->db->table('tb_penyesuaian')->where(['id_penyesuaian'=>$id])->delete();
      
        session()->setFlashdata('delete','Data Berhasil Di Hapus');
        return  redirect()->to(site_url('penyesuaian/index'));
    }
    public function show($id)
    {
        $penyesuaian = $this->PenyesuaianModel->find($id);
        $akun3 = $this->Akun3Model->findall();
        $status = $this->StatusModel->findall();
        $nilai = $this->NilaipenyesuaianModel->ambilrelasiid($id);
        $data ['dtnilaipenyesuaian'] = $nilai;

        if(is_object($penyesuaian)){
           $data['dtakun3'] = $akun3;
           $data['dtstatus'] = $status;
           $data['dtpenyesuaian'] = $penyesuaian;
           $data['dtnilaipenyesuaian'] = $nilai;
            
           return view('penyesuaian/show' , $data);
       }else{
           throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
       }
    }
    public function edit($id = null)
    {   
         $penyesuaian = $this->PenyesuaianModel->find($id);
         $akun3 = $this->Akun3Model->findall();
         $status = $this->StatusModel->findall();
         $nilai = $this->NilaipenyesuaianModel->findall();
         $data ['dtnilaipenyesuaian'] = $nilai;

         if(is_object($penyesuaian)){
            $data['dtakun3'] = $akun3;
            $data['dtstatus'] = $status;
            $data['dtpenyesuaian'] = $penyesuaian;
            $data['dtnilaipenyesuaian'] = $nilai;

            return view('penyesuaian/edit' , $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        };
    }
    public function editdata()
    {

        $db = \config\Database::connect();

        $id_penyesuaian = $this->request->getVar('idx');
        $idn = $this->request->getVar('id');
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        $data = $this->request->getPost();
        $data = [
            // 'kwitansi' => $this->request->getVar('kwitansix'),
            'tanggal' => $this->request->getVar('tanggalx'),
            'nilai' => $this->request->getVar('nilaix'),
            'deskripsi' => $this->request->getVar('deskripsix'),
            'waktu' => $this->request->getVar('waktux'),
            'jumlah' => $this->request->getVar('jumlahx'),
        ];
        $this->db->table('tb_penyesuaian')->where('id_penyesuaian',$id_penyesuaian)->update($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');

 

        foreach($idn as $key => $ids ){
            $result [] = [
                'id' => $idn[$key],
                'kode_akun3' => $kode_akun3[$key],
                'debit' => $debit[$key],
                'kredit'=> $kredit[$key],
                'id_status' => $id_status[$key],
            ];
        }

        $this->NilaipenyesuaianModel->updateBatch($result, 'id');
        // $this->TransaksiModel->update($data)->where(['id_Transaksi'=>$idakn]);
        return redirect()->to('penyesuaian/index')->with('berhasil','Data Berhasil Terupdate');
    }
}
