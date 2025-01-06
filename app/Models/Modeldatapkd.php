<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldatapkd extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_data-pkd')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_data-pkd')->insert($data);
    }

    public function DetailData($nama)
    {
        return $this->db->table('tbl_data-pkd')
            ->where('nama', $nama)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_data-pkd')
            ->where('nama', $data['nama'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_data-pkd')
            ->where('nama', $data['nama'])
            ->delete($data);
    }
}
