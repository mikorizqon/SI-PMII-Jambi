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
            'nik' => [
                'rules' => 'required|is_unique[tbl_data-mapaba.nik]',
                'errors' => [
                    'required' => 'NIK harus diisi',
                    'is_unique' => 'NIK sudah terdaftar'
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
            'tahun_mapaba' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Mapaba harus diisi'
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
                'tahun_mapaba' => $this->request->getPost('tahun_mapaba'),
            ];

            if ($this->Modeldatamapaba->insertDataUser($data)) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan!');
                return redirect()->to('userdatamapaba');
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data!');
                return redirect()->to('userdatamapaba/input')->withInput();
            }
        } else {
            // Jika validasi gagal, kembali ke form dengan error
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
                'nama_lama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_mapaba' => $this->request->getPost('tahun_mapaba'),
            ];

            if ($this->Modeldatamapaba->updateDataUser($data)) {
                session()->setFlashdata('update', 'Data berhasil diperbarui!');
                return redirect()->to('userdatamapaba');
            } else {
                session()->setFlashdata('error', 'Gagal memperbarui data!');
                return redirect()->to('userdatamapaba/edit/' . $nama)->withInput();
            }
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

    public function deletedata($nama)
    {
        try {
            $data = [
                'nama' => $nama,
            ];
            
            if ($this->Modeldatamapaba->DeleteData($data)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data!');
            }
            
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data!');
            log_message('error', 'Delete error: ' . $e->getMessage());
        }
        
        return redirect()->to('userdatamapaba');
    }

    public function input()
    {
        $data = [
            'judul' => 'Input Data Mapaba',
            'subjudul' => 'INPUT DATA MAPABA',
            'menu' => 'userdatamapaba',
            'submenu' => 'userdatamapaba',
            'page' => 'userdatamapaba/v_input',
        ];
        return view('v_template_user', $data);
    }
}
