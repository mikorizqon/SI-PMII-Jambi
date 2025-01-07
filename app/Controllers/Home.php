<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelpmii;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Modelpmii = new Modelpmii();
    }

    public function index()
    {
        $data = [
            'judul' => 'Home',
            'subjudul' => '',
            'web' => $this->Modelpmii->DetailData(),
            'page' => 'v_login',
        ];
        return view('v_template_front_end', $data);
    }
}