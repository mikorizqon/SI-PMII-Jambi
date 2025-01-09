<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelpmii;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $Modelpmii;
    protected $ModelAuth;

    public function __construct()
    {
        $this->Modelpmii = new Modelpmii();
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'judul' => 'Login',
            'subjudul' => '',
            'web' => $this->Modelpmii->DetailData(),
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'level' => [
                'label' => 'Level User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ]
        ])) {
            $username = $this->request->getPost('username');
            $level = $this->request->getPost('level');
            $password = sha1($this->request->getPost('password'));
            
            $cek = $this->ModelAuth->LoginUser($username, $password, $level);
            
            if ($cek) {
                session()->set([
                    'id_user' => $cek['id_user'],
                    'nama_user' => $cek['nama_user'],
                    'level' => $cek['level'],
                    'logged_in' => true
                ]);
                
                if ($level == 1) {
                    return redirect()->to('DashboardAdmin');
                } else if ($level == 2) {
                    return redirect()->to('DashboardAdmin/DashboardPengurusCabang');
                }
            } else {
                session()->setFlashdata('pesan','username atau password salah');
                return redirect()->to('Auth/index');
            }
            
            //jika valid
        } else {
            return redirect()->to('Auth')->withInput();
        }
    }

    public function Logout()
    {
        session()->destroy();
        return redirect()->to('Auth');
    }
}

