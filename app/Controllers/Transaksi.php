<?php

namespace App\Controllers;
use App\Models\Akun3Model;
use App\Models\TransaksiModel;
use App\Models\Akun2Model;
use App\Models\StatusModel;
use App\Models\NilaiModel;
class Transaksi extends BaseController
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
        
        $builder = $this->db->table('tb_transaksi');
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM tb_transaksi");
        $result = $query->getResult();
        // $hasil =  $this->TransaksiModel->ambilrelasi();

        $data = [
            'title'=>'Data Akun',
            'transaksi'=>$result
        ];
        return view('transaksi/index', $data);
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
        return view('Transaksi/addakun',$data);
    }
    public function save()
    {
      
        $data = $this->request->getPost();
        $data = [
            // 'kwitansi' => $this->request->getVar('kwitansix'),
            'kwitansi' => $this->TransaksiModel->noKwitansi(),
            'tanggal' => $this->request->getVar('tanggalx'),
            'ketJurnal' => $this->request->getVar('ketJurnalx'),
            'deskripsi' => $this->request->getVar('deskripsix'),
        ];
        $this->db->table('tb_transaksi')->insert($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');

        $id_transaksi = $this->TransaksiModel->insertID();
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        for($i =0;$i<count($kode_akun3); $i++){
            $data2 [] = [
                'id_transaksi' => $id_transaksi,
                'kode_akun3' => $kode_akun3[$i],
                'debit' => $debit[$i],
                'kredit'=> $kredit[$i],
                'id_status' => $id_status[$i],
            ];
        }

        $this->NilaiModel->insertBatch($data2);

        return redirect()->to('Transaksi/add')->with('success','Data Berhasil Disimpan');
    }
    public function edit($id = null)
    {   
         $transaksi = $this->TransaksiModel->find($id);
         $akun3 = $this->Akun3Model->findall();
         $status = $this->StatusModel->findall();
         $nilai = $this->NilaiModel->findall();
         $data ['dtnilai'] = $nilai;

         if(is_object($transaksi)){
            $data['dtakun3'] = $akun3;
            $data['dtstatus'] = $status;
            $data['dttransaksi'] = $transaksi;

            return view('Transaksi/edit' , $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

    }
    public function editdata()
    {

        $db = \config\Database::connect();

        $id_transaksi = $this->request->getVar('idx');
        $idn = $this->request->getVar('id_nilai');
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        $data = $this->request->getPost();
        $data = [
            // 'kwitansi' => $this->request->getVar('kwitansix'),
            'tanggal' => $this->request->getVar('tanggalx'),
            'ketJurnal' => $this->request->getVar('ketJurnalx'),
            'deskripsi' => $this->request->getVar('deskripsix'),
        ];
        $this->db->table('tb_transaksi')->where('id_transaksi',$id_transaksi)->update($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');

 

        foreach($idn as $key => $ids ){
            $result [] = [
                'id_nilai' => $idn[$key],
                'kode_akun3' => $kode_akun3[$key],
                'debit' => $debit[$key],
                'kredit'=> $kredit[$key],
                'id_status' => $id_status[$key],
            ];
        }

        $this->NilaiModel->updateBatch($result, 'id_nilai');
        // $this->TransaksiModel->update($data)->where(['id_Transaksi'=>$idakn]);
        return redirect()->to('Transaksi/index')->with('berhasil','Data Berhasil Terupdate');
    }
    public function delete($id)
    {
        $this->db->table('tb_transaksi')->where(['id_Transaksi'=>$id])->delete();
      
        session()->setFlashdata('delete','Data Berhasil Di Hapus');
        return  redirect()->to(site_url('Transaksi/index'));
    }

    public function show($id)
    {
        $transaksi = $this->TransaksiModel->find($id);
        $akun3 = $this->Akun3Model->findall();
        $status = $this->StatusModel->findall();
        $nilai = $this->NilaiModel->ambilrelasiid($id);
        $data ['dtnilai'] = $nilai;

        if(is_object($transaksi)){
           $data['dtakun3'] = $akun3;
           $data['dtstatus'] = $status;
           $data['dttransaksi'] = $transaksi;

           return view('Transaksi/show' , $data);
       }else{
           throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
       }
    }

    
    public function akun3()
    {
        
        $result = $this->Akun3Model->findall();

        return $this->response->setJSON($result);
    }
    public function status()
    {
        $result = $this->StatusModel->findall();
        return $this->response->setJSON($result);
    }
    
}
