<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldatamapaba extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_data-mapaba')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_data-mapaba')->insert($data);
    }

    public function DetailData($nama)
    {
        return $this->db->table('tbl_data-mapaba')
            ->where('nama', $nama)
            ->get()->getRowArray();
    }

    public function updatedata($data)
    {
        return $this->db->table('tbl_data-mapaba')
            ->where('nama', $data['nama_lama'])
            ->update([
                'nik'           => $data['nik'],
                'nama'          => $data['nama'],
                'tempat_lahir'  => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'cabang'        => $data['cabang'],
                'universitas'   => $data['universitas'],
                'tahun_mapaba'  => $data['tahun_mapaba']
            ]);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_data-mapaba')
            ->where('nama', $data['nama'])
            ->delete($data);
    }

    public function AllDataByCabang($cabang)
    {
        $builder = $this->db->table('tbl_data-mapaba');
        $builder->where('cabang', $cabang);
        $builder->orderBy('created_at', 'DESC');
        $query = $builder->get();
        log_message('info', 'Query: ' . $this->db->getLastQuery());
        return $query->getResultArray();
    }
}
