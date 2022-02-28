<?php

namespace App\Models;

use CodeIgniter\Model;

class FUmum extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fasilitas_umum';
    protected $primaryKey       = 'nama_fumum';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_fumum', 'nama_fumum', 'foto', 'deskripsi'];

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

    public function hitung_fumum()
    {
        return $this->table('fasilitas_umum')->countAll();
    }

    public function search($keyword)
    {
        return $this->table('fasilitas_umum')->like('nama_fumum', $keyword)->orLike('deskripsi', $keyword);
    }
}
