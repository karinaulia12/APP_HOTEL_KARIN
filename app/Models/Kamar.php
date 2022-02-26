<?php

namespace App\Models;

use CodeIgniter\Model;

class Kamar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kamar';
    protected $primaryKey       = 'no_kamar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kamar', 'no_kamar', 'type_kamar', 'foto', 'harga', 'deskripsi'];

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

    // public function kamarjoin_fkamar($id_kamar) {
    //     // $this->db->select('*');
    //     $this->db->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->where('id_kamar', $id_kamar)->get()->result();

    // }

    public function hitung_kamar()
    {
        return $this->db->table('kamar')->countAll();
    }

    public function search($keyword)
    {
        $builder = $this->table('kamar');
        $builder->like('no_kamar', $keyword);
        return $builder;
    }
}
