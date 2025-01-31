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

    public function UpdateData($data)
    {
        $this->db->table('tbl_data-alumni')
            ->where('nama', $data['nama'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_data-alumni')
            ->where('nama', $data['nama'])
            ->delete($data);
    }

    public function AllDataByCabang($cabang)
    {
        $builder = $this->db->table('tbl_data-alumni');
        $builder->where('cabang', $cabang);
        $builder->orderBy('created_at', 'DESC');
        $query = $builder->get();
        log_message('info', 'Query: ' . $this->db->getLastQuery());
        return $query->getResultArray();
    }
}
