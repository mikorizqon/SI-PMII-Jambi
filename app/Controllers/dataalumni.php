<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldataalumni;

class dataalumni extends BaseController
{
    protected $Modeldataalumni;

    public function __construct()
    {
        $this->Modeldataalumni = new Modeldataalumni();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Master Data',
            'subjudul'   => 'DATA ALUMNI',
            'menu'       => 'master-data',
            'submenu'    => 'dataalumni',
            'page'       => 'dataalumni/v_index',
            'dataalumni' => $this->Modeldataalumni->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul'      => 'dataalumni',
            'subjudul'   => 'Input Data Alumni',
            'menu'       => 'master-data',
            'submenu'    => 'dataalumni',
            'page'       => 'dataalumni/v_input',
            'dataalumni' => $this->Modeldataalumni->AllData(),
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
            'propesi' => [
                'label' => 'propesi',
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
                'propesi'   => $this->request->getPost('propesi'),
            ];
            $this->Modeldataalumni->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('dataalumni');

            //jika valid
        } else {
            return redirect()->to('dataalumni/Input')->withInput();
        }
    }

    public function Edit($nama)
    {
        $data = [
            'judul'      => 'Data alumni',
            'subjudul'   => 'Edit Data',
            'menu'       => 'master-data',
            'submenu'    => 'dataalumni',
            'page'       => 'dataalumni/v_edit',
            'dataalumni' => $this->Modeldataalumni->DetailData($nama),
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
                'label' => 'cabang',
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
            'propesi' => [
                'label' => 'propesi',
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
                'propesi'        => $this->request->getPost('propesi'),
            ];
            $this->Modeldataalumni->updatedata($data);
            session()->setFlashdata('update', 'Data berhasil diperbarui!');
            return redirect()->to('dataalumni');
        }
        return redirect()->to('dataalumni')->withInput();
    }

    public function deletedata($nama)
    {
        $data = [
            'nama' => $nama,
        ];
        $this->Modeldataalumni->deletedata($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete');
        return redirect()->to('dataalumni');
    }
}
