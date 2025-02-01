<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatapkl;

class datapkl extends BaseController
{
    protected $Modeldatapkl;

    public function __construct()
    {
        $this->Modeldatapkl = new Modeldatapkl();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Master Data',
            'subjudul'   => 'DATA PKL',
            'menu'       => 'master-data',
            'submenu'    => 'datapkl',
            'page'       => 'datapkl/v_index',
            'datapkl' => $this->Modeldatapkl->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul'      => 'datapkl',
            'subjudul'   => 'Input Data PKL',
            'menu'       => 'master-data',
            'submenu'    => 'datapkl',
            'page'       => 'datapkl/v_input',
            'datapkl' => $this->Modeldatapkl->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tanggal_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cabang' => [
                'label' => 'Cabang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'universitas' => [
                'label' => 'Universitas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tahun_pkl' => [
                'label' => 'Tahun pkl',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])) {
            $data = [
                'nik'            => $this->request->getPost('nik'),
                'nama'           => $this->request->getPost('nama'),
                'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                'cabang'         => $this->request->getPost('cabang'),
                'universitas'    => $this->request->getPost('universitas'),
                'tahun_pkl'   => $this->request->getPost('tahun_pkl'),
            ];
            $this->Modeldatapkl->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('datapkl');

            //jika valid
        } else {
            return redirect()->to('datapkl/Input')->withInput();
        }
    }

    public function Edit($nama)
    {
        $data = [
            'judul'      => 'Data pkl',
            'subjudul'   => 'Edit Data',
            'menu'       => 'master-data',
            'submenu'    => 'datapkl',
            'page'       => 'datapkl/v_edit',
            'datapkl' => $this->Modeldatapkl->DetailData($nama),
        ];
        return view('v_template_admin', $data);
    }

    public function updatedata($nama)
    {
        if ($this->validate([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tanggal_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cabang' => [
                'label' => 'Cabang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'universitas' => [
                'label' => 'Universitas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'tahun_pkl' => [
                'label' => 'Tahun pkl',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])) {
            $data = [
                'nama_lama'      => $nama,
                'nik'            => $this->request->getPost('nik'),
                'nama'           => $this->request->getPost('nama'),
                'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                'cabang'         => $this->request->getPost('cabang'),
                'universitas'    => $this->request->getPost('universitas'),
                'tahun_pkl'      => $this->request->getPost('tahun_pkl'),
            ];
            $this->Modeldatapkl->updatedata($data);
            session()->setFlashdata('update', 'Data berhasil diperbarui!');
            return redirect()->to('datapkl');
        }
        return redirect()->to('datapkl')->withInput();
    }

    public function deletedata($nama)
    {
        $data = [
            'nama' => $nama,
        ];
        $this->Modeldatapkl->deletedata($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete');
        return redirect()->to('datapkl');
    }
}
