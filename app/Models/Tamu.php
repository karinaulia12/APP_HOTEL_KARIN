<?php

namespace App\Models;

use CodeIgniter\Model;

class Tamu extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tamu';
    protected $primaryKey       = 'nik';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nik', 'nama_tamu', 'no_telp', 'email', 'username', 'password'];

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

    public function jml_tamu()
    {
        return $this->db->table('tamu')->countAll();
    }

    public function search($keyword)
    {
        return $this->table('tamu')->like('nik', $keyword)->orLike('no_telp', $keyword)->orLike('nama_tamu', $keyword)->orLike('email', $keyword)->orLike('username', $keyword);
    }
}
