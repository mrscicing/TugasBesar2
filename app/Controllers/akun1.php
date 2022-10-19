<?php

namespace App\Controllers;

class akun1 extends BaseController
{
    
    public function __consturct()
    {
        
        
    }
    public function index()
    {
        
        $builder = $this->db->table('akun1s');
        $query = $builder->get();
        $query = $this->db->query("SELECT * FROM akun1s");
        $result = $query->getResult();
        $data = [
            'title'=>'Data Akun',
            'akun1'=>$result
        ];
        return view('akun1/index', $data);
    }
    public function add()
    {
        $data=[
            'title'=>'Tambah Akun'
        ];
        return view('akun1/addakun',$data);
    }
    public function save()
    {
      
        $data = $this->request->getPost();
        $data = [
            'kode_akun1' => $this->request->getVar('kode_akun'),
            'nama_akun1' => $this->request->getVar('nama_akun')
        ];
        $this->db->table('akun1s')->insert($data);
        session()->setFlashdata('berhasil','Data Berhasil Ditambahkan');
        return redirect()->to('akun1/add')->with('success','Data Berhasil Disimpan');
    }
    public function edit($id)
    {   
        $data = [
            'id'=>$id,
            'title' =>'Update Data'
        ];
        return view('akun1/edit', $data);
    }
    public function editdata()
    {
        $idakn =  $this->request->getVar('id_akun');
        $data=[
            
            'kode_akun1'=>$this->request->getVar('kode_akun'),
            'nama_akun1'=>$this->request->getVar('nama_akun')
        ];
        $this->db->table('akun1s')->where(['id_akun1'=>$idakn])->update($data);
        return redirect()->to('akun1/index')->with('berhasil','Data Berhasil Terupdate');
    }
    public function delete($id)
    {
        $this->db->table('akun1s')->where(['id_akun1'=>$id])->delete();
      
        session()->setFlashdata('delete','Data Berhasil Di Hapus');
        return  redirect()->to(site_url('akun1/index'));
    }
}
