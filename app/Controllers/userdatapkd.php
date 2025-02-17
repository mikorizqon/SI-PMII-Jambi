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
        $cabang = session()->get('cabang');
        log_message('info', 'Cabang yang diambil: ' . $cabang);

        $userdatapkd = $this->Modeldatapkd->AllDataByCabang($cabang);
        log_message('info', 'Data yang diambil: ' . print_r($userdatapkd, true));

        $data = [
            'judul' => 'Data PKD',
            'userdatapkd' => $userdatapkd,
            'subjudul' => 'DATA PKD',
            'menu' => 'userdatapkd',
            'submenu' => 'userdatapkd',
            'page' => 'userdatapkd/v_index',
        ];
        return view('v_template_user', $data);
    }

    public function input()
    {
        $data = [
            'judul' => 'Input Data PKD',
            'subjudul' => 'INPUT DATA PKD',
            'menu' => 'userdatapkd',
            'submenu' => 'userdatapkd',
            'page' => 'userdatapkd/v_input',
        ];
        return view('v_template_user', $data);
    }

    public function insertdata()
    {
        if ($this->validate([
            'nik' => [
                'rules' => 'required|is_unique[tbl_data-pkd.nik]',
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
            'tahun_pkd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun PKD harus diisi'
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
                'tahun_pkd' => $this->request->getPost('tahun_pkd'),
            ];

            if ($this->Modeldatapkd->insertDataUser($data)) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan!');
                return redirect()->to('userdatapkd');
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data!');
                return redirect()->to('userdatapkd/input')->withInput();
            }
        } else {
            return redirect()->to('userdatapkd/input')->withInput();
        }
    }

    public function edit($nama)
    {
        $userdatapkd = $this->Modeldatapkd->DetailData($nama);
        
        if (empty($userdatapkd)) {
            session()->setFlashdata('error', 'Data tidak ditemukan!');
            return redirect()->to('userdatapkd');
        }

        $data = [
            'judul' => 'Edit Data PKD',
            'subjudul' => 'Edit Data',
            'menu' => 'master-data',
            'submenu' => 'userdatapkd',
            'page' => 'userdatapkd/v_edit',
            'userdatapkd' => $userdatapkd
        ];
        return view('v_template_user', $data);
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
                'nama_lama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkd' => $this->request->getPost('tahun_pkd'),
            ];

            if ($this->Modeldatapkd->updateDataUser($data)) {
                session()->setFlashdata('update', 'Data berhasil diperbarui!');
                return redirect()->to('userdatapkd');
            } else {
                session()->setFlashdata('error', 'Gagal memperbarui data!');
                return redirect()->to('userdatapkd/edit/' . $nama)->withInput();
            }
        } else {
            return redirect()->to('userdatapkd/edit/' . $nama)->withInput();
        }
    }

    public function deletedata($nama)
    {
        try {
            $data = [
                'nama' => $nama,
            ];
            
            if ($this->Modeldatapkd->DeleteData($data)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data!');
            }
            
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data!');
            log_message('error', 'Delete error: ' . $e->getMessage());
        }
        
        return redirect()->to('userdatapkd');
    }
}
