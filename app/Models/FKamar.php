<?php

namespace App\Models;

use CodeIgniter\Model;

class FKamar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fasilitas_kamar';
    protected $primaryKey       = 'id_fkamar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_fkamar', 'nama_fkamar', 'id_type_kamar'];

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


    public function hitung_fkamar()
    {
        return $this->table('fasilitas_kamar')->countAll();
    }

    public function get_typeKamar()
    {
        return $this->db->table('fasilitas_kamar')
            ->select('*')
            ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            // ->like('nama_fkamar', $keyword)
            // ->orLike('type_kamar', $keyword)
            ->get()->getResultArray();
    }

    public function search($keyword)
    {
        return $this->db->table('fasilitas_kamar')
            ->select('*')
            ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->like('nama_fkamar', $keyword)
            ->orLike('type_kamar', $keyword)
            ->get()->getResultArray();
    }

    public function typeKamar_inDetail($id)
    {
        return $this->db->table('fasilitas_kamar')
            ->select('*')
            ->where('id_kamar', $id)
            ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->join('kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get()->getResultArray();
    }

    public function detail_fkamar($id)
    {
        return $this->db->table('fasilitas_kamar')
            ->select('*')
            ->where('id_fkamar', $id)
            ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->get()->getResultArray();
    }
}
