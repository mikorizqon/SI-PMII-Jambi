<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatapkd;

class Userdatapkd extends BaseController
{
    protected $Modeldatapkd;

    public function __construct()
    {
        $this->Modeldatapkd = new Modeldatapkd();
    }

    public function index()
    {
        $cabang = session()->get('cabang'); // Ambil cabang dari sesi pengguna
        log_message('info', 'Cabang yang diambil: ' . $cabang); // Cek nilai cabang

        $userdatapkd = $this->Modeldatapkd->AllDataByCabang($cabang);
        log_message('info', 'Data yang diambil: ' . print_r($userdatapkd, true)); // Cek data yang diambil

        $data = [
            'judul' => 'Data PKD',
            'userdatapkd' => $userdatapkd, // Ambil data berdasarkan cabang
            'subjudul' => 'DATA PKD',
            'menu' => 'userdatapkd',
            'submenu' => 'userdatapkd',
            'page' => 'userdatapkd/v_index',
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
            'tahun_pkd' => 'required',
        ])) {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkd' => $this->request->getPost('tahun_pkd'),
            ];
            $this->Modeldatapkd->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('userdatapkd');
        } else {
            return redirect()->to('userdatapkd/input')->withInput();
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
            'tahun_pkd' => 'required',
        ])) {
            $data = [
                'nama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkd' => $this->request->getPost('tahun_pkd'),
            ];
            $this->Modeldatapkd->updatedata($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('userdatapkd');
        } else {
            return redirect()->to('userdatapkd/edit/' . $nama)->withInput();
        }
    }

    public function edit($nama)
    {
        $userdatapkd = $this->Modeldatapkd->DetailData($nama); // Ambil data berdasarkan nama
        if (!$userdatapkd) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $data = [
            'judul' => 'Edit Data Pkd',
            'subjudul' => 'Edit Data',
            'menu'       => 'master-data',
            'userdatapkd' => $userdatapkd,
            'submenu'    => 'userdatapkd',
            'page'       => 'userdatapkd/v_edit',
        ];
        return view('v_template_user', $data); // Tampilkan view edit
    }
    public function deletedata($nama)
        {
            $data= [
                'nama'=> $nama,
            ];
            $this->Modeldatapkd->deletedata($data);
            session()->setFlashdata('delete', 'Data Berhasil Didelete');
            return redirect()->to('userdatapkd');
        }
}
