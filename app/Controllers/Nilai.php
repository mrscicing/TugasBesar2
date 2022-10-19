<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Models\NilaiModel;
use App\Models\Akun2Model;
class Nilai extends BaseController
{
    
    public function __construct()
    {
        $this->NilaiModel = new NilaiModel();  
        $this->Akun2Model = new Akun2Model();
        
    }
    public function index()
    {
        
        $builder = $this->db->table('tb_Nilai');
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM tb_Nilai");
        $result = $query->getResult();
        // $hasil =  $this->NilaiModel->ambilrelasi();

        $data = [
            'title'=>'Data Akun',
            'Nilai'=>$result
        ];
        return view('Nilai/index', $data);
    }
    public function add()
    {
        // $builder = $this->db->table("akun1s");
        // $query = $builder->get();
        // $query = $this->db->query("SELECT * FROM akun1s");
        // $result = $query->getResult();
        // $hasil = $this->Akun2Model->findall();
        $data=[
            // 'Nilaip'=>$hasil,
            // 'Nilai' => $result,
            'title'=>'Nilai'
        ];
        return view('Nilai/addakun',$data);
    }
    public function save()
    {
      
        $data = $this->request->getPost();
        $data = [
            'id_transaksi' => $this->request->getVar('id_transaksix'),
            'kode_akun3' => $this->request->getVar('kode_akun3x'),
            'debit' => $this->request->getVar('debitx'),
            'kredit' => $this->request->getVar('kreditx'),
            'id_status' => $this->request->getVar('id_statusx'),
        ];
        $this->db->table('tb_Nilai')->insert($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');
        return redirect()->to('Nilai/add')->with('success','Data Berhasil Disimpan');
    }
    public function edit($id)
    {   
         $builder = $this->db->table("akun1s");
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM akun1s");
        $result = $query->getResult();
        $hasil = $this->Akun2Model->findall();
        $data=[
            'id'=>$id,
            'Nilaip'=>$hasil,
            'Nilai' => $result,
            'title'=>'Update Data'
        ];
        return view('Nilai/edit',$data);
    }
    public function editdata()
    {
        if(!$this->validate([
            'kode_Nilai'=>'required|numeric[Nilais.kode_Nilai]'
        ])){
            session()->setFlashdata('notif','*!Masukkan Input Berupa Angka');
            return redirect()->to('Nilai/edit/re')->with('gagal','Data Gagal Terupdate');
        };

        $db = \config\Database::connect();
        $builder = $db->table('Nilais');

        $idakn =  $this->request->getVar('id_akun');
        $data=[
            
            'kode_Nilai'=>$this->request->getVar('kode_Nilai'),
            'nama_Nilai'=>$this->request->getVar('nama_Nilai'),
            'kode_akun1'=>$this->request->getVar('id_akun1x'),
            'kode_akun2'=>$this->request->getVar('id_akun2x')
        ];
        $builder->where('id_Nilai',$idakn)->update($data);
        // $this->NilaiModel->update($data)->where(['id_Nilai'=>$idakn]);
        return redirect()->to('Nilai/index')->with('berhasil','Data Berhasil Terupdate');
    }
    public function delete($id)
    {
        $this->db->table('Nilais')->where(['id_Nilai'=>$id])->delete();
      
        session()->setFlashdata('delete','Data Berhasil Di Hapus');
        return  redirect()->to(site_url('Nilai/index'));
    }
}
