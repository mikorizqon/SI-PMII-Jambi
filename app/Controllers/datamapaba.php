<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatamapaba;

class datamapaba extends BaseController
{

    public function __construct()
    {
        $this->Modeldatamapaba = new Modeldatamapaba();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Master Data',
            'subjudul'   => 'DATA MAPABA',
            'menu'       => 'master-data',
            'submenu'    => 'datamapaba',
            'page'       => 'datamapaba/v_index',
            'datamapaba' => $this->Modeldatamapaba->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul'      => 'datamapaba',
            'subjudul'   => 'Input Data Mapaba',
            'menu'       => 'master-data',
            'submenu'    => 'datamapaba',
            'page'       => 'datamapaba/v_input',
            'datamapaba' => $this->Modeldatamapaba->AllData(),
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
            'tahun_mapaba' => [
                'label' => 'Tahun Mapaba',
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
                'tahun_mapaba'   => $this->request->getPost('tahun_mapaba'),
            ];
            $this->Modeldatamapaba->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('datamapaba');

            //jika valid
        } else {
            return redirect()->to('datamapaba/Input')->withInput();
        }
    }

    public function Edit($nama)
    {
        $data = [
            'judul'      => 'Data Mapaba',
            'subjudul'   => 'Edit Data',
            'menu'       => 'master-data',
            'submenu'    => 'datamapaba',
            'page'       => 'datamapaba/v_edit',
            'datamapaba' => $this->Modeldatamapaba->DetailData($nama),
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
            'tahun_mapaba' => [
                'label' => 'Tahun Mapaba',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])) {
            $data = [
                'nama' => $nama,
                'nik'            => $this->request->getPost('nik'),
                'nama'           => $this->request->getPost('nama'),
                'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                'cabang'         => $this->request->getPost('cabang'),
                'universitas'    => $this->request->getPost('universitas'),
                'tahun_mapaba'   => $this->request->getPost('tahun_mapaba'),
            ];
            $this->Modeldatamapaba->updatedata($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate');
            return redirect()->to('datamapaba');

            //jika valid
        } else {
            return redirect()->to('datamapaba')->withInput();
        }
    }

    public function deletedata($nama)
    {
        $data = [
            'nama' => $nama,
        ];
        $this->Modeldatamapaba->deletedata($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete');
        return redirect()->to('datamapaba');
    }
}
