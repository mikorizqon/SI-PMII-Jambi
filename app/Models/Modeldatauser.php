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

    public function deletedata($data)
    {
        $this->db->table('tbl_user')
            ->where('nama_user', $data['nama'])
            ->delete($data);
    }

    public function updatedata($data)
    {
        return $this->db->table('tbl_user')
            ->where('nama_user', $data['nama_lama'])
            ->update([
                'nama_user' => $data['nama_user'],
                'username' => $data['username'],
                'password' => $data['password'],
                'level'    => $data['level']
            ]);
    }
}
