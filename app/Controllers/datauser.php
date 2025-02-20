<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeldatauser;

class datauser extends BaseController
{
    protected $Modeldatauser;

    public function __construct()
    {
        $this->Modeldatauser = new Modeldatauser();
    }

    public function index()
    {
        $data = [
            'judul'      => 'Master Data',
            'subjudul'   => 'DATA User',
            'menu'       => 'master-data',
            'submenu'    => 'datauser',
            'page'       => 'datauser/v_index',
            'datauser' => $this->Modeldatauser->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function Input()
    {
        $data = [
            'judul'      => 'datauser',
            'subjudul'   => 'Input Data user',
            'menu'       => 'master-data',
            'submenu'    => 'datauser',
            'page'       => 'datauser/v_input',
            'datauser' => $this->Modeldatauser->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'nama_user',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'level' => [
                'label' => 'level',
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
        ])) {
            $data = [
                'nama_user'  => $this->request->getPost('nama_user'),
                'username'   => $this->request->getPost('username'),
                'password'   => $this->request->getPost('password'),
                'level'      => $this->request->getPost('level'),
                'cabang'     => $this->request->getPost('cabang'),
            ];
            $this->Modeldatauser->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan');
            return redirect()->to('datauser');
        }
        return redirect()->to('datauser/Input')->withInput();
    }

    public function Edit($nama)
    {
        $data = [
            'judul'      => 'Data user',
            'subjudul'   => 'Edit Data',
            'menu'       => 'master-data',
            'submenu'    => 'datauser',
            'page'       => 'datauser/v_edit',
            'datauser'   => $this->Modeldatauser->DetailData($nama),
        ];
        return view('v_template_admin', $data);
    }

    public function updatedata($nama)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'nama_user',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'level' => [
                'label' => 'level',
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
        ])) {
            $data = [
                'nama_lama'  => $nama,
                'nama_user'  => $this->request->getPost('nama_user'),
                'username'   => $this->request->getPost('username'),
                'password'   => $this->request->getPost('password'),
                'level'      => $this->request->getPost('level'),
                'cabang'     => $this->request->getPost('cabang'),
            ];
            $this->Modeldatauser->updatedata($data);
            session()->setFlashdata('update', 'Data berhasil diperbarui!');
            return redirect()->to('datauser');
        }
        return redirect()->to('datauser')->withInput();
    }

    public function deletedata($nama)
    {
        $data = [
            'nama_user' => $nama,
        ];
        $this->Modeldatauser->deletedata($data);
        session()->setFlashdata('delete', 'Data Berhasil Didelete');
        return redirect()->to('datauser');
    }
}
