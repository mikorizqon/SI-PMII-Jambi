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

    public function AllDataByCabang($cabang)
    {
        $builder = $this->db->table('tbl_data-pkn');
        $builder->where('cabang', $cabang);
        $builder->orderBy('created_at', 'DESC');
        $query = $builder->get();
        log_message('info', 'Query: ' . $this->db->getLastQuery());
        return $query->getResultArray();
    }

    public function insertDataUser($data)
    {
        try {
            // Tambahkan created_at
            $data['created_at'] = date('Y-m-d H:i:s');
            
            $result = $this->db->table('tbl_data-pkn')->insert($data);

            // Log untuk debugging
            log_message('info', 'Insert Data User: ' . print_r($data, true));
            log_message('info', 'Query: ' . $this->db->getLastQuery());
            
            return $result;
        } catch (\Exception $e) {
            log_message('error', 'Error inserting data: ' . $e->getMessage());
            return false;
        }
    }

    public function DetailData($nama)
    {
        return $this->db->table('tbl_data-pkn')
            ->where('nama', $nama)
            ->get()->getRowArray();
    }

    public function updateDataUser($data)
    {
        try {
            $result = $this->db->table('tbl_data-pkn')
                ->where('nama', $data['nama_lama'])
                ->update([
                    'nik'           => $data['nik'],
                    'nama'          => $data['nama'],
                    'tempat_lahir'  => $data['tempat_lahir'],
                    'tanggal_lahir' => $data['tanggal_lahir'],
                    'cabang'        => $data['cabang'],
                    'universitas'   => $data['universitas'],
                    'tahun_pkn'     => $data['tahun_pkn']
                ]);

            log_message('info', 'Update Data User: ' . print_r($data, true));
            log_message('info', 'Query: ' . $this->db->getLastQuery());
            
            return $result;
        } catch (\Exception $e) {
            log_message('error', 'Error updating data: ' . $e->getMessage());
            return false;
        }
    }

    public function DeleteData($data)
    {
        try {
            $result = $this->db->table('tbl_data-pkn')
                ->where('nama', $data['nama'])
                ->delete();
            
            log_message('info', 'Delete Data: ' . print_r($data, true));
            log_message('info', 'Query: ' . $this->db->getLastQuery());
            
            return $result;
        } catch (\Exception $e) {
            log_message('error', 'Error deleting data: ' . $e->getMessage());
            return false;

        }
    }

            public function updatedata($data)
            {
                try {
                    $result = $this->db->table('tbl_data-pkn')
                        ->where('nama', $data['nama_lama'])
                        ->update([
                            'nik'           => $data['nik'],
                            'nama'          => $data['nama'],
                            'tempat_lahir'  => $data['tempat_lahir'],
                            'tanggal_lahir' => $data['tanggal_lahir'],
                            'cabang'        => $data['cabang'],
                            'universitas'   => $data['universitas'],
                            'tahun_pkn'     => $data['tahun_pkn']
                        ]);
        
                    log_message('info', 'Update Data pkn: ' . print_r($data, true));
                    log_message('info', 'Query: ' . $this->db->getLastQuery());
                    
                    return $result;
                } catch (\Exception $e) {
                    log_message('error', 'Error updating data: ' . $e->getMessage());
                    return false;
                }
            }
        
            public function InsertData($data)
            {
                try {
                    // Tambahkan created_at
                    $data['created_at'] = date('Y-m-d H:i:s');
                    
                    $result = $this->db->table($this->table)->insert($data);
        
                    // Log untuk debugging
                    log_message('info', 'Insert Data pkn: ' . print_r($data, true));
                    log_message('info', 'Query: ' . $this->db->getLastQuery());
                    
                    return $result;
                } catch (\Exception $e) {
                    log_message('error', 'Error inserting data: ' . $e->getMessage());
                    return false;
        }
    }
}
