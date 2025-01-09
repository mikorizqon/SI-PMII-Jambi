<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldatauser extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_user')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function DetailData($nama_user)
    {
        return $this->db->table('tbl_user')
            ->where('nama_user', $nama_user)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_user')
            ->where('nama_user', $data['nama_user'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_user')
            ->where('nama_user', $data['nama_user'])
            ->delete($data);
    }
}
