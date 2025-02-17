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
        $cabang = session()->get('cabang');
        log_message('info', 'Cabang yang diambil: ' . $cabang);

        $userdatapkl = $this->Modeldatapkl->AllDataByCabang($cabang);
        log_message('info', 'Data yang diambil: ' . print_r($userdatapkl, true));

        $data = [
            'judul' => 'Data PKL',
            'userdatapkl' => $userdatapkl,
            'subjudul' => 'DATA PKL',
            'menu' => 'userdatapkl',
            'submenu' => 'userdatapkl',
            'page' => 'userdatapkl/v_index',
        ];
        return view('v_template_user', $data);
    }

    public function input()
    {
        $data = [
            'judul' => 'Input Data PKL',
            'subjudul' => 'INPUT DATA PKL',
            'menu' => 'userdatapkl',
            'submenu' => 'userdatapkl',
            'page' => 'userdatapkl/v_input',
        ];
        return view('v_template_user', $data);
    }

    public function insertdata()
    {
        if ($this->validate([
            'nik' => [
                'rules' => 'required|is_unique[tbl_data-pkl.nik]',
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
            'tahun_pkl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun PKL harus diisi'
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
                'tahun_pkl' => $this->request->getPost('tahun_pkl'),
            ];

            if ($this->Modeldatapkl->insertDataUser($data)) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan!');
                return redirect()->to('userdatapkl');
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data!');
                return redirect()->to('userdatapkl/input')->withInput();
            }
        } else {
            return redirect()->to('userdatapkl/input')->withInput();
        }
    }

    public function edit($nama)
    {
        $userdatapkl = $this->Modeldatapkl->DetailData($nama);
        if (!$userdatapkl) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        $data = [
            'judul' => 'Edit Data PKL',
            'subjudul' => 'Edit Data',
            'menu' => 'master-data',
            'userdatapkl' => $userdatapkl,
            'submenu' => 'userdatapkl',
            'page' => 'userdatapkl/v_edit',
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
            'tahun_pkl' => 'required',
        ])) {
            $data = [
                'nama_lama' => $nama,
                'nik' => $this->request->getPost('nik'),
                'nama' => $this->request->getPost('nama'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'cabang' => $this->request->getPost('cabang'),
                'universitas' => $this->request->getPost('universitas'),
                'tahun_pkl' => $this->request->getPost('tahun_pkl'),
            ];

            if ($this->Modeldatapkl->updateDataUser($data)) {
                session()->setFlashdata('update', 'Data berhasil diperbarui!');
                return redirect()->to('userdatapkl');
            } else {
                session()->setFlashdata('error', 'Gagal memperbarui data!');
                return redirect()->to('userdatapkl/edit/' . $nama)->withInput();
            }
        } else {
            return redirect()->to('userdatapkl/edit/' . $nama)->withInput();
        }
    }

    public function deletedata($nama)
    {
        try {
            $data = [
                'nama' => $nama,
            ];
            
            if ($this->Modeldatapkl->DeleteData($data)) {
                session()->setFlashdata('success', 'Data berhasil dihapus!');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data!');
            }
            
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Terjadi kesalahan saat menghapus data!');
            log_message('error', 'Delete error: ' . $e->getMessage());
        }
        
        return redirect()->to('userdatapkl');
    }
}
