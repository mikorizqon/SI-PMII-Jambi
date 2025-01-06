<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpmii extends Model
{
    public function DetailData()
    {
        return $this->db->table('tbl_pmii')
            ->where('id', 1)
            ->get()->getRowArray();
    }
}
