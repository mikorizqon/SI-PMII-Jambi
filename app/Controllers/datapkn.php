<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatapkn;

class datapkn extends BaseController
{

    public function __construct()
    {
        $this->Modeldatapkn = new Modeldatapkn();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Master Data',
            'subjudul'   => 'DATA PKN',
            'menu'       => 'master-data',
            'submenu'    => 'datapkn',
            'page'       => 'datapkn/v_index',
            'datapkn' => $this->Modeldatapkn->AllData(),
        ];
        return view('v_template_admin', $data);
    }
    
    public function Input()
    {
        $data = [
            'judul'      => 'datapkn',
            'subjudul'   => 'Input Data PKN',
            'menu'       => 'master-data',
            'submenu'    => 'datapkn',
            'page'       => 'datapkn/v_input',
            'datapkn' => $this->Modeldatapkn->AllData(),
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
            'tahun_pkn' => [
                'label' => 'Tahun pkn',
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
                    'tahun_pkn'   => $this->request->getPost('tahun_pkn'),
                ];
                $this->Modeldatapkn->InsertData($data);
                session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
                return redirect()->to('datapkn');   

                //jika valid
            } else {
                return redirect()->to('datapkn/Input')->withInput();
            }
        }

        public function Edit($nama)
        {
            $data = [
                'judul'      => 'Data pkn',
                'subjudul'   => 'Edit Data',
                'menu'       => 'master-data',
                'submenu'    => 'datapkn',
                'page'       => 'datapkn/v_edit',
                'datapkn' => $this->Modeldatapkn->DetailData($nama),
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
            'tahun_pkn' => [
                'label' => 'Tahun pkn',
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
                    'tahun_pkn'   => $this->request->getPost('tahun_pkn'),
                ];
                $this->Modeldatapkn->updatedata($data);
                session()->setFlashdata('update', 'Data Berhasil Diupdate');
                return redirect()->to('datapkn');   

                //jika valid
            } else {
                return redirect()->to('datapkn/Input')->withInput();
            }
        }

        public function deletedata($nama)
        {
            $data= [
                'nama'=> $nama,
            ];
            $this->Modeldatapkn->deletedata($data);
            session()->setFlashdata('delete', 'Data Berhasil Didelete');
            return redirect()->to('datapkn');
        }
}
