<?php
 
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RestapiModel;

class Restapi extends BaseController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new RestapiModel();
        $data['rest_api'] = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {

        $namaakun = $this->request->getVar("nama_akun");
        $kode=$this->request->getVar("kode");


        $model = new RestapiModel();
        $data = [
            'nama_akun' => $namaakun,
            'kode'  => $kode
        ];
        $model->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respond($response);
    }
    // single user
    public function show($id = null)
    {
        $model = new RestapiModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new RestapiModel();
        $id = $this->request->getVar('id');
        $data = [
            'nama_akun' => $this->request->getVar('nama_akun'),
            'kode'  => $this->request->getVar('kode'),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id = null)
    {
        $model = new RestapiModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}