<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldataalumni;

class Userdataalumni extends BaseController
{
    protected $Modeldataalumni;

    public function __construct()
    {
        $this->Modeldataalumni = new Modeldataalumni();
    }

    public function index()
    {
        $cabang = session()->get('cabang'); // Ambil cabang dari sesi pengguna
        log_message('info', 'Cabang yang diambil: ' . $cabang); // Cek nilai cabang

        $userdataalumni = $this->Modeldataalumni->AllDataByCabang($cabang);
        log_message('info', 'Data yang diambil: ' . print_r($userdataalumni, true)); // Cek data yang diambil

        $data = [
            'judul' => 'Data alumni',
            'userdataalumni' => $userdataalumni, // Ambil data berdasarkan cabang
            'subjudul' => 'DATA ALUMNI',
            'menu' => 'userdataalumni',
            'submenu' => 'userdataalumni',
            'page' => 'userdataalumni/v_index',
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
            'tahun_alumni' => 'required',
        ])) {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_alumni' => $this->request->getPost('tahun_alumni'),
            ];
            $this->Modeldataalumni->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('userdataalumni');
        } else {
            return redirect()->to('userdataalumni/input')->withInput();
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
            'tahun_alumni' => 'required',
        ])) {
            $data = [
                'nama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_alumni' => $this->request->getPost('tahun_alumni'),
            ];
            $this->Modeldataalumni->updatedata($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('userdataalumni');
        } else {
            return redirect()->to('userdataalumni/edit/' . $nama)->withInput();
        }
    }

    public function edit($nama)
    {
        $userdataalumni = $this->Modeldataalumni->DetailData($nama); // Ambil data berdasarkan nama
        if (!$userdataalumni) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $data = [
            'judul' => 'Edit Data alumni',
            'subjudul' => 'Edit Data',
            'menu'       => 'master-data',
            'userdataalumni' => $userdataalumni,
            'submenu'    => 'userdataalumni',
            'page'       => 'userdataalumni/v_edit',
        ];
        return view('v_template_user', $data); // Tampilkan view edit
    }
}
