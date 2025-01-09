<?php

namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard Admin',
            'subjudul' => 'Dashboard Admin',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_admin',
        ];
        return view('v_template_admin', $data);
    }
    public function DashboardPengurusCabang()
    {
        $data = [
            'judul' => 'Dashboard Pengurus Cabang',
            'subjudul' => 'Dashboard Pengurus Cabang',
            'menu' => 'dashboard',
            'submenu' => 'dashboard',
            'page' => 'v_dashboard_user',
        ];
        return view('v_template_user', $data);
    }
}
