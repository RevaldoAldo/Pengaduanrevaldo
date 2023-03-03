<?php

namespace App\Controllers;
use App\Models\Masyarakat;

class RegisterController extends BaseController
{
    protected $masyarakats;
    function __construct()
    {
        $this->masyarakats = new Masyarakat();
    }
    public function index()
    {
        return view('register_view');
    }
    public function create()
    {
        $data = array(
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password')."", PASSWORD_DEFAULT),
            'telp' => $this->request->getPost('telp'),
        );
        $this->masyarakats->insert($data);
        session()->setFlashdata("message","Data Berhasil Disimpan ");
        return $this->response->redirect('/login');
    }      
}    