<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservasiKamar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reservasi_kamar';
    protected $primaryKey       = 'id_reservasi_kamar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_reservasi_kamar', 'id_kamar', 'id_reservasi'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_noKamar($id_rsv)
    {
        $syarat = ['id_reservasi' => $id_rsv];
        $a = $this->db->table('reservasi_kamar')
            ->select('no_kamar')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->where($syarat)
            ->get()->getResultArray();

        // dd($a);
    }
}
