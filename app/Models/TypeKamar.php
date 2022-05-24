<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeKamar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'type_kamar';
    protected $primaryKey       = 'type_kamar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_type_kamar', 'type_kamar', 'harga', 'stok_kamar', 'foto'];

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

    public function join_fasilitas()
    {
        return $this->db->table('type_kamar')->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')->get()->getResultArray();
    }

    public function join_kamar_utkDetail($id_kamar)
    {
        return $this->db->table('type_kamar')
            ->select('*')
            ->where('id_kamar', $id_kamar)
            ->join('kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get();
    }

    public function search($keyword)
    {
        return $this->db->table('type_kamar')
            ->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
            ->like('type_kamar', $keyword)
            ->orLike('harga', $keyword)
            ->orLike('nama_fkamar', $keyword);
    }
}
