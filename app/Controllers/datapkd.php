<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatapkd;

class datapkd extends BaseController
{

    public function __construct()
    {
        $this->Modeldatapkd = new Modeldatapkd();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Master Data',
            'subjudul'   => 'DATA PKD',
            'menu'       => 'master-data',
            'submenu'    => 'datapkd',
            'page'       => 'datapkd/v_index',
            'datapkd' => $this->Modeldatapkd->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    
    public function Input()
    {
        $data = [
            'judul'      => 'datapkd',
            'subjudul'   => 'Input Data PKD',
            'menu'       => 'master-data',
            'submenu'    => 'datapkd',
            'page'       => 'datapkd/v_input',
            'datapkd' => $this->Modeldatapkd->AllData(),
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
            'alamat_tinggal' => [
                'label' => 'Alamat Tinggal',
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
            'tahun_pkd' => [
                'label' => 'Tahun PKD',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])) {
                $data= [
                    'nik'            => $this->request->getPost('nik'),
                    'nama'           => $this->request->getPost('nama'),
                    'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                    'alamat_tinggal' => $this->request->getPost('alamat_tinggal'),
                    'universitas'    => $this->request->getPost('universitas'),
                    'tahun_pkd'   => $this->request->getPost('tahun_pkd'),
                ];
                $this->Modeldatapkd->InsertData($data);
                session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
                return redirect()->to('datapkd');   

                //jika valid
            } else {
                return redirect()->to('datapkd/Input')->withInput();
            }
        }

        public function Edit($nama)
        {
            $data = [
                'judul'      => 'Data pkd',
                'subjudul'   => 'Edit Data',
                'menu'       => 'master-data',
                'submenu'    => 'datapkd',
                'page'       => 'datapkd/v_edit',
                'datapkd' => $this->Modeldatapkd->DetailData($nama),
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
            'alamat_tinggal' => [
                'label' => 'Alamat Tinggal',
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
            'tahun_pkd' => [
                'label' => 'Tahun pkd',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
        ])) {
                $data= [
                    'nama'=> $nama,
                    'nik'            => $this->request->getPost('nik'),
                    'nama'           => $this->request->getPost('nama'),
                    'tempat_lahir'   => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                    'alamat_tinggal' => $this->request->getPost('alamat_tinggal'),
                    'universitas'    => $this->request->getPost('universitas'),
                    'tahun_pkd'   => $this->request->getPost('tahun_pkd'),
                ];
                $this->Modeldatapkd->updatedata($data);
                session()->setFlashdata('update', 'Data Berhasil Diupdate');
                return redirect()->to('datapkd');   

                //jika valid
            } else {
                return redirect()->to('datapkd/Input')->withInput();
            }
        }

        public function deletedata($nama)
        {
            $data= [
                'nama'=> $nama,
            ];
            $this->Modeldatapkd->deletedata($data);
            session()->setFlashdata('delete', 'Data Berhasil Didelete');
            return redirect()->to('datapkd');
        }
}
