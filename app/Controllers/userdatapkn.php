<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatapkn;

class Userdatapkn extends BaseController
{
    protected $Modeldatapkn;

    public function __construct()
    {
        $this->Modeldatapkn = new Modeldatapkn();
    }

    public function index()
    {
        $cabang = session()->get('cabang'); // Ambil cabang dari sesi pengguna
        log_message('info', 'Cabang yang diambil: ' . $cabang); // Cek nilai cabang

        $userdatapkn = $this->Modeldatapkn->AllDataByCabang($cabang);
        log_message('info', 'Data yang diambil: ' . print_r($userdatapkn, true)); // Cek data yang diambil

        $data = [
            'judul' => 'Data PKN',
            'userdatapkn' => $userdatapkn, // Ambil data berdasarkan cabang
            'subjudul' => 'DATA PKN',
            'menu' => 'userdatapkn',
            'submenu' => 'userdatapkn',
            'page' => 'userdatapkn/v_index',
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
            'tahun_pkn' => 'required',
        ])) {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkn' => $this->request->getPost('tahun_pkn'),
            ];
            $this->Modeldatapkn->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('userdatapkn');
        } else {
            return redirect()->to('userdatapkn/input')->withInput();
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
            'tahun_pkn' => 'required',
        ])) {
            $data = [
                'nama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkn' => $this->request->getPost('tahun_pkn'),
            ];
            $this->Modeldatapkn->updatedata($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('userdatapkn');
        } else {
            return redirect()->to('userdatapkn/edit/' . $nama)->withInput();
        }
    }

    public function edit($nama)
    {
        $userdatapkn = $this->Modeldatapkn->DetailData($nama); // Ambil data berdasarkan nama
        if (!$userdatapkn) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $data = [
            'judul' => 'Edit Data Pkn',
            'subjudul' => 'Edit Data',
            'menu'       => 'master-data',
            'userdatapkn' => $userdatapkn,
            'submenu'    => 'userdatapkn',
            'page'       => 'userdatapkn/v_edit',
        ];
        return view('v_template_user', $data); // Tampilkan view edit
    }

    public function deletedata($nama)
        {
            $data= [
                'nama'=> $nama,
            ];
            $this->Modeldatapkn->deletedata($data);
            session()->setFlashdata('delete', 'Data Berhasil Didelete');
            return redirect()->to('userdatapkn');
        }
}
