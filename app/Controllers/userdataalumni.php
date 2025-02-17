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
            'judul' => 'Data Alumni',
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
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat lahir harus diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir harus diisi'
                ]
            ],
            'cabang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Cabang harus diisi'
                ]
            ],
            'universitas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Universitas harus diisi'
                ]
            ],
            'propesi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Propesi harus diisi'
                ]
            ],
        ])) {
            $data = [
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'propesi' => $this->request->getPost('propesi'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            try {
                if ($this->Modeldataalumni->InsertData($data)) {
                    session()->setFlashdata('success', 'Data berhasil ditambahkan!');
                    return redirect()->to('userdataalumni');
                } else {
                    session()->setFlashdata('error', 'Gagal menambahkan data!');
                    return redirect()->to('userdataalumni/input')->withInput();
                }
            } catch (\Exception $e) {
                log_message('error', 'Error saat insert data: ' . $e->getMessage());
                session()->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data');
                return redirect()->to('userdataalumni/input')->withInput();
            }
        } else {
            session()->setFlashdata('error', $this->validator->listErrors());
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
            'propesi' => 'required',
        ])) {
            $data = [
                'nama_lama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'propesi' => $this->request->getPost('propesi'),
            ];

            if ($this->Modeldataalumni->updateDataUser($data)) {
                session()->setFlashdata('success', 'Data berhasil diperbarui!');
                return redirect()->to('userdataalumni');
            } else {
                session()->setFlashdata('error', 'Gagal memperbarui data!');
                return redirect()->to('userdataalumni/edit/' . $nama)->withInput();
            }
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

    public function deletedata($nama)
    {
        try {
            $data = [
                'nama' => $nama,
            ];
            
            if ($this->Modeldataalumni->DeleteData($data)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data!');
            }
            
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data!');
            log_message('error', 'Delete error: ' . $e->getMessage());
        }
        
        return redirect()->to('userdataalumni');
    }

    public function input()
    {
        $data = [
            'judul' => 'Input Data Alumni',
            'subjudul' => 'INPUT DATA ALUMNI',
            'menu' => 'userdataalumni',
            'submenu' => 'userdataalumni',
            'page' => 'userdataalumni/v_input',
        ];
        return view('v_template_user', $data);
    }
}
