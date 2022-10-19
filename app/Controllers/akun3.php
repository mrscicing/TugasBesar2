<?php

namespace App\Controllers;
use App\Models\Akun3Model;
use App\Models\Akun2Model;
class akun3 extends BaseController
{
    
    public function __construct()
    {
        $this->Akun3Model = new Akun3Model();  
        $this->Akun2Model = new Akun2Model();
        
    }
    public function index()
    {
        
        // $builder = $this->db->table('akun3s');
        // $query = $builder->get();
        // $query = $this->db->query("SELECT * FROM akun3s");
        // $result = $query->getResult();
        $hasil =  $this->Akun3Model->ambilrelasi();

        $data = [
            'title'=>'Data Akun',
            'akun3'=>$hasil
        ];
        return view('akun3/index', $data);
    }
    public function add()
    {
        $builder = $this->db->table("akun1s");
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM akun1s");
        $result = $query->getResult();
        $hasil = $this->Akun2Model->findall();
        $data=[
            'akun3p'=>$hasil,
            'akun3' => $result,
            'title'=>'Tambah Akun'
        ];
        return view('akun3/addakun',$data);
    }
    public function save()
    {
      
        $data = $this->request->getPost();
        $data = [

            'kode_akun3' => $this->request->getVar('kode_akun'),
            'nama_akun3' => $this->request->getVar('nama_akun'),
            'kode_akun2' => $this->request->getVar('id_akun2x'),
            'kode_akun1' => $this->request->getVar('id_akun1x'),
        ];
        $this->db->table('akun3s')->insert($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');
        return redirect()->to('akun3/add')->with('success','Data Berhasil Disimpan');
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
            'akun3p'=>$hasil,
            'akun3' => $result,
            'title'=>'Update Data'
        ];
        return view('akun3/edit',$data);
    }
    public function editdata()
    {
        if(!$this->validate([
            'kode_akun3'=>'required|numeric[akun3s.kode_akun3]'
        ])){
            session()->setFlashdata('notif','*!Masukkan Input Berupa Angka');
            return redirect()->to('akun3/edit/re')->with('gagal','Data Gagal Terupdate');
        };

        $db = \config\Database::connect();
        $builder = $db->table('akun3s');

        $idakn =  $this->request->getVar('id_akun');
        $data=[
            
            'kode_akun3'=>$this->request->getVar('kode_akun3'),
            'nama_akun3'=>$this->request->getVar('nama_akun3'),
            'kode_akun1'=>$this->request->getVar('id_akun1x'),
            'kode_akun2'=>$this->request->getVar('id_akun2x')
        ];
        $builder->where('id_akun3',$idakn)->update($data);
        // $this->Akun3Model->update($data)->where(['id_akun3'=>$idakn]);
        return redirect()->to('akun3/index')->with('berhasil','Data Berhasil Terupdate');
    }
    public function delete($id)
    {
        $this->db->table('akun3s')->where(['id_akun3'=>$id])->delete();
      
        session()->setFlashdata('delete','Data Berhasil Di Hapus');
        return  redirect()->to(site_url('akun3/index'));
    }
}
