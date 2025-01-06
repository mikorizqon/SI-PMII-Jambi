<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWeb extends Model
{
    protected $table = 'tbl_web';
    
    public function web()
    {
        $data = $this->first();
        
        // Jika data kosong, berikan nilai default
        if (empty($data)) {
            return [
                'nama' => 'PMII PKC Jambi',
                'logo_pmii' => 'logo-pmii.png'
            ];
        }
        
        return $data;
    }
} 