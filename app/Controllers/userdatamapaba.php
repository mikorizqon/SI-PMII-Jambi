<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatamapaba;

class Userdatamapaba extends BaseController
{
    protected $Modeldatamapaba;

    public function __construct()
    {
        $this->Modeldatamapaba = new Modeldatamapaba();
    }

    public function index()
    {
        $cabang = session()->get('cabang'); // Ambil cabang dari sesi pengguna
        log_message('info', 'Cabang yang diambil: ' . $cabang); // Cek nilai cabang

        $userdatamapaba = $this->Modeldatamapaba->AllDataByCabang($cabang);
        log_message('info', 'Data yang diambil: ' . print_r($userdatamapaba, true)); // Cek data yang diambil

        $data = [
            'judul' => 'Data Mapaba',
            'userdatamapaba' => $userdatamapaba, // Ambil data berdasarkan cabang
            'subjudul' => 'DATA MAPABA',
            'menu' => 'userdatamapaba',
            'submenu' => 'userdatamapaba',
            'page' => 'userdatamapaba/v_index',
        ];
        return view('v_template_user', $data); // Pastikan mengembalikan view dengan data yang benar
    }

    public function insertdata()
    {
        if ($this->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'cabang' => 'required',
            'universitas' => 'required',
            'tahun_mapaba' => 'required',
        ])) {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_mapaba' => $this->request->getPost('tahun_mapaba'),
            ];
            $this->Modeldatamapaba->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('userdatamapaba');
        } else {
            return redirect()->to('userdatamapaba/input')->withInput();
        }
    }

    public function updatedata($nama)
    {
        if ($this->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'cabang' => 'required',
            'universitas' => 'required',
            'tahun_mapaba' => 'required',
        ])) {
            $data = [
                'nama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_mapaba' => $this->request->getPost('tahun_mapaba'),
            ];
            $this->Modeldatamapaba->updatedata($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('userdatamapaba');
        } else {
            return redirect()->to('userdatamapaba/edit/' . $nama)->withInput();
        }
    }

    public function edit($nama)
    {
        $userdatamapaba = $this->Modeldatamapaba->DetailData($nama); // Ambil data berdasarkan nama
        if (!$userdatamapaba) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $data = [
            'judul' => 'Edit Data Mapaba',
            'subjudul' => 'Edit Data',
            'menu'       => 'master-data',
            'userdatamapaba' => $userdatamapaba,
            'submenu'    => 'userdatamapaba',
            'page'       => 'userdatamapaba/v_edit',
        ];
        return view('v_template_user', $data); // Tampilkan view edit
    }
}
