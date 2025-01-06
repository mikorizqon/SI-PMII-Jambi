<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldatapkl extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_data-pkl')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_data-pkl')->insert($data);
    }

    public function DetailData($nama)
    {
        return $this->db->table('tbl_data-pkl')
            ->where('nama', $nama)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_data-pkl')
            ->where('nama', $data['nama'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_data-pkl')
            ->where('nama', $data['nama'])
            ->delete($data);
    }
}
