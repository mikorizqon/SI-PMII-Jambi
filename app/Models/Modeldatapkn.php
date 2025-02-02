<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldatapkn extends Model
{
    protected $table = 'tbl_data-pkn';
    protected $primaryKey = 'nama';
    protected $allowedFields = ['nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'cabang', 'universitas', 'tahun_pkn'];

    public function AllData()
    {
        return $this->db->table('tbl_data-pkn')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_data-pkn')->insert($data);
    }

    public function DetailData($nama)
    {
        return $this->db->table('tbl_data-pkn')
            ->where('nama', $nama)
            ->get()->getRowArray();
    }

    public function deletedata($data)
    {
        $this->db->table('tbl_data-pkn')
            ->where('nama', $data['nama'])
            ->delete($data);
    }

    public function updatedata($data)
    {
        return $this->db->table($this->table)
            ->where('nama', $data['nama'])
            ->update([
                'nik'           => $data['nik'],
                'nama'          => $data['nama'],
                'tempat_lahir'  => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'cabang'        => $data['cabang'],
                'universitas'   => $data['universitas'],
                'tahun_pkn'     => $data['tahun_pkn']
            ]);
    }

    public function AllDataByCabang($cabang)
    {
        return $this->db->table($this->table)
            ->where('cabang', $cabang)
            ->get()
            ->getResultArray();
    }
}
