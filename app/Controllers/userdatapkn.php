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
            'nik' => [
                'rules' => 'required|is_unique[tbl_data-pkn.nik]',
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
            'tahun_pkn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun PKN harus diisi'
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
                'tahun_pkn' => $this->request->getPost('tahun_pkn'),
            ];

            if ($this->Modeldatapkn->insertDataUser($data)) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan!');
                return redirect()->to('userdatapkn');
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data!');
                return redirect()->to('userdatapkn/input')->withInput();
            }
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
                'nama_lama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkn' => $this->request->getPost('tahun_pkn'),
            ];

            if ($this->Modeldatapkn->updateDataUser($data)) {
                session()->setFlashdata('update', 'Data berhasil diperbarui!');
                return redirect()->to('userdatapkn');
            } else {
                session()->setFlashdata('error', 'Gagal memperbarui data!');
                return redirect()->to('userdatapkn/edit/' . $nama)->withInput();
            }
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
        try {
            $data = [
                'nama' => $nama,
            ];
            
            if ($this->Modeldatapkn->DeleteData($data)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data!');
            }
            
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data!');
            log_message('error', 'Delete error: ' . $e->getMessage());
        }
        
        return redirect()->to('userdatapkn');
    }

    public function input()
    {
        $data = [
            'judul' => 'Input Data PKN',
            'subjudul' => 'INPUT DATA PKN',
            'menu' => 'userdatapkn',
            'submenu' => 'userdatapkn',
            'page' => 'userdatapkn/v_input',
        ];
        return view('v_template_user', $data);
    }
}
