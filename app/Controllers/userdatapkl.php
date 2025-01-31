<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatapkl;

class Userdatapkl extends BaseController
{
    protected $Modeldatapkl;

    public function __construct()
    {
        $this->Modeldatapkl = new Modeldatapkl();
    }

    public function index()
    {
        $cabang = session()->get('cabang'); // Ambil cabang dari sesi pengguna
        log_message('info', 'Cabang yang diambil: ' . $cabang); // Cek nilai cabang

        $userdatapkl = $this->Modeldatapkl->AllDataByCabang($cabang);
        log_message('info', 'Data yang diambil: ' . print_r($userdatapkl, true)); // Cek data yang diambil

        $data = [
            'judul' => 'Data pkl',
            'userdatapkl' => $userdatapkl, // Ambil data berdasarkan cabang
            'subjudul' => 'DATA PKL',
            'menu' => 'userdatapkl',
            'submenu' => 'userdatapkl',
            'page' => 'userdatapkl/v_index',
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
            'tahun_pkl' => 'required',
        ])) {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkl' => $this->request->getPost('tahun_pkl'),
            ];
            $this->Modeldatapkl->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('userdatapkl');
        } else {
            return redirect()->to('userdatapkl/input')->withInput();
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
            'tahun_pkl' => 'required',
        ])) {
            $data = [
                'nama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkl' => $this->request->getPost('tahun_pkl'),
            ];
            $this->Modeldatapkl->updatedata($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('userdatapkl');
        } else {
            return redirect()->to('userdatapkl/edit/' . $nama)->withInput();
        }
    }

    public function edit($nama)
    {
        $userdatapkl = $this->Modeldatapkl->DetailData($nama); // Ambil data berdasarkan nama
        if (!$userdatapkl) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $data = [
            'judul' => 'Edit Data Pkl',
            'subjudul' => 'Edit Data',
            'menu'       => 'master-data',
            'userdatapkl' => $userdatapkl,
            'submenu'    => 'userdatapkl',
            'page'       => 'userdatapkl/v_edit',
        ];
        return view('v_template_user', $data); // Tampilkan view edit
    }
}
