<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldataalumni extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_data-alumni')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_data-alumni')->insert($data);
    }

    public function DetailData($nama)
    {
        return $this->db->table('tbl_data-alumni')
            ->where('nama', $nama)
            ->get()->getRowArray();
    }

    public function deletedata($data)
    {
        $this->db->table('tbl_data-alumni')
            ->where('nama', $data['nama'])
            ->delete($data);
    }

    public function updatedata($data)
    {
        return $this->db->table('tbl_data-alumni')
            ->where('nama', $data['nama_lama'])
            ->update([
                'nik'           => $data['nik'],
                'nama'          => $data['nama'],
                'tempat_lahir'  => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'cabang'        => $data['cabang'],
                'universitas'   => $data['universitas'],
                'propesi'       => $data['propesi']
            ]);
    }
}
