<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Masyarakat;

class MasyarakatController extends Basecontroller
{
    protected $masyarakatt;

    function __construct()
    {
        $this->masyarakatt = new Masyarakat();
    }

    public function index()
    {
        $data['masyarakat'] = $this->masyarakatt->findAll();
        return view('masyarakat_view', $data);
    }

    public function save()
    {
        $data = array(
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'telp' => $this->request->getPost('telp'),
        );

        $this->masyarakatt->insert($data);
        session()->setFlashdata("message", "Data Berhasil Disimpan !");
        return $this->response->redirect('/masyarakat');
    }

    public function edit($id)
    {
        if ($this->request->getPost('ubah_password') == null) {
            $data = array(
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'telp' => $this->request->getPost('telp'),
            );
        } else {

            $data = array(
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'telp' => $this->request->getPost('telp'),
            );
            $this->masyarakatt->update($id, $data);
        }
        session()->setFlashdata("message", "Data Berhasil Diubah !");
        return $this->response->redirect('/masyarakat');
    }

    public function delete($id)
    {
        $this->masyarakatt->delete($id);
        session()->setFlashdata("message", "Data Berhasil Dihapus !");
        return $this->response->redirect('/masyarakat');
    }
}
