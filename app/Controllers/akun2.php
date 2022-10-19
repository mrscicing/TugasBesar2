<?php

namespace App\Controllers;

use App\Models\Akun2Model;
use CodeIgniter\Database\Database;
use CodeIgniter\Debug\Toolbar\Collectors\Database as CollectorsDatabase;

class akun2 extends BaseController
{
    
    

    public function __construct()
    {
        $this->Akun2Model = new \App\Models\Akun2Model();        
    }
    public function index()
    {
        
        $hasil =  $this->Akun2Model->getdata();
        $data = [
            'title'=>'Data Akun',
            'akun2'=>$hasil
        ];
        return view('akun2/index', $data);
    }
    public function add()
    {

        $builder = $this->db->table("akun1s");
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM akun1s");
        $result = $query->getResult();
        $data=[
            'akun2' => $result,
            'title'=>'Tambah Akun'
        ];
        return view('akun2/addakun',$data);
    }
    public function save()
    {
      
        $data = $this->request->getPost();
        $data = [
            'kode_akun2' => $this->request->getVar('kode_akun'),
            'nama_akun2' => $this->request->getVar('nama_akun'),
            'kode_akun1' => $this->request->getVar('id_akun1x')
        ];
        $this->Akun2Model->save($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');
        return redirect()->to('akun2/add')->with('success','Data Berhasil Disimpan');
    }
    public function edit($id)
    {   
        
        $builder = $this->db->table("akun1s");
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM akun1s");
        $result = $query->getResult();
       
        $data = [
            'akun2'=>$result,
            'id'=>$id,
            'title' =>'Update Data'
        ];
        return view('akun2/edit', $data);
    }
    public function editdata()
    {
        if(!$this->validate([
            'kode_akun2'=>'required|numeric[akun2s.kode_akun2]'
        ])){
            session()->setFlashdata('notif','*!Masukkan Input Berupa Angka');
            return redirect()->to('akun2/edit/re')->with('gagal','Data Gagal Terupdate');
        };

        $db = \config\Database::connect();
        $builder = $db->table('akun2s');

        $idakn =  $this->request->getVar('id_akun');
        $data=[
            
            'kode_akun2'=>$this->request->getVar('kode_akun2'),
            'nama_akun2'=>$this->request->getVar('nama_akun2'),
            'kode_akun1'=>$this->request->getVar('id_akun1x')
        ];
        $builder->where('id_akun2',$idakn)->update($data);
        // $this->Akun2Model->update($data)->where(['id_akun2'=>$idakn]);
        return redirect()->to('akun2/index')->with('berhasil','Data Berhasil Terupdate');
    }
    public function delete($id)
    {
        // $this->db->table('akun2s')->where(['id_akun2'=>$id])->delete();
        $this->Akun2Model->table('akun2s')->where(['id_akun2'=>$id])->delete();
      
        session()->setFlashdata('delete','Data Berhasil Di Hapus');
        return  redirect()->to(site_url('akun2/index'));
    }
}
