<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengaduan;

class PengaduanController extends BaseController
{
    protected $pengaduan,$tanggapan;

    function __construct()
    {
        $this->pengaduan = new Pengaduan();
    }

    public function index()
    {
        $data['pengaduan'] = $this->pengaduan->findAll();
        return view('pengaduan_view', $data);
    }

    public function save()
    {
        $data = array(
            'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
            'nik' => $this->request->getPost('nik'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
            'foto' => $this->request->getPost('foto'),
            'status' => $this->request->getPost('status'),
        );
        
        $this->pengaduan->insert($data);
        session()->setFlashdata("message", "Data Berhasil Disimpan !");
        return $this->response->redirect('/pengaduan');
    }

    public function edit($id)
    {
        $data=array(
            'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
            'nik' => $this->request->getPost('nik'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
            'foto' => $this->request->getPost('foto'),
            'status' => $this->request->getPost('status'),
        );
        $this->pengaduan->update($id, $data);
        session()->setFlashdata("message", "Data Berhasil Dirubah !");
        return $this->response->redirect('/pengaduan');
    }
    public function delete($id)
    {
        $this->pengaduan->delete($id);
        session()->setFlashdata("message", "Data Berhasil Dihapus !");
        return $this->response->redirect('/pengaduan'); 
    }        

    
   
}
