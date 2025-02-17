<?php

namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    protected $Modeldatamapaba;
    protected $Modeldatapkd;
    protected $Modeldatapkl;
    protected $Modeldatapkn;
    protected $Modeldataalumni;
    protected $Modeldatauser;

    public function __construct()
    {
        $this->Modeldatamapaba = new \App\Models\Modeldatamapaba();
        $this->Modeldatapkd = new \App\Models\Modeldatapkd();
        $this->Modeldatapkl = new \App\Models\Modeldatapkl();
        $this->Modeldatapkn = new \App\Models\Modeldatapkn();
        $this->Modeldataalumni = new \App\Models\Modeldataalumni();
        $this->Modeldatauser = new \App\Models\Modeldatauser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard Admin',
            'subjudul' => 'Dashboard Admin',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_admin',
            'total_mapaba' => count($this->Modeldatamapaba->AllData()),
            'total_pkd' => count($this->Modeldatapkd->AllData()),
            'total_pkl' => count($this->Modeldatapkl->AllData()),
            'total_pkn' => count($this->Modeldatapkn->AllData()),
            'total_alumni' => count($this->Modeldataalumni->AllData()),
            'total_users' => count($this->Modeldatauser->AllData()),
        ];
        return view('v_template_admin', $data);
    }
    public function DashboardPengurusCabang()
    {
        $cabang = session()->get('cabang');
        
        $data = [
            'judul' => 'Dashboard Pengurus Cabang',
            'subjudul' => 'Dashboard Pengurus Cabang',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_user',
            'total_mapaba' => count($this->Modeldatamapaba->AllDataByCabang($cabang)),
            'total_pkd' => count($this->Modeldatapkd->AllDataByCabang($cabang)),
            'total_pkl' => count($this->Modeldatapkl->AllDataByCabang($cabang)),
            'total_pkn' => count($this->Modeldatapkn->AllDataByCabang($cabang)),
            'total_alumni' => count($this->Modeldataalumni->AllDataByCabang($cabang)),
        ];
        return view('v_template_user', $data);
    }
}
