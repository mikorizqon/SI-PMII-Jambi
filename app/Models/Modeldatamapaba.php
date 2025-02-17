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
        try {
            $result = $this->db->table('tbl_data-mapaba')
                ->where('nama', $data['nama'])
                ->delete();
            
            // Log untuk debugging
            log_message('info', 'Delete Data: ' . print_r($data, true));
            log_message('info', 'Query: ' . $this->db->getLastQuery());
            
            return $result;
        } catch (\Exception $e) {
            log_message('error', 'Error deleting data: ' . $e->getMessage());
            return false;
        }
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

    public function updateDataUser($data)
    {
        try {
            // Pastikan data yang akan diupdate berdasarkan nama_lama
            $result = $this->db->table('tbl_data-mapaba')
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

            // Log untuk debugging
            log_message('info', 'Update Data User: ' . print_r($data, true));
            log_message('info', 'Query: ' . $this->db->getLastQuery());
            
            return $result;
        } catch (\Exception $e) {
            // Log error jika terjadi masalah
            log_message('error', 'Error updating data: ' . $e->getMessage());
            return false;
        }
    }

    public function insertDataUser($data)
    {
        try {
            // Tambahkan created_at
            $data['created_at'] = date('Y-m-d H:i:s');
            
            $result = $this->db->table('tbl_data-mapaba')->insert($data);

            // Log untuk debugging
            log_message('info', 'Insert Data User: ' . print_r($data, true));
            log_message('info', 'Query: ' . $this->db->getLastQuery());
            
            return $result;
        } catch (\Exception $e) {
            // Log error jika terjadi masalah
            log_message('error', 'Error inserting data: ' . $e->getMessage());
            return false;
        }
    }
}
