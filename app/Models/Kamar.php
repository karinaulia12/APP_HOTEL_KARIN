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
    protected $allowedFields    = ['id_kamar', 'no_kamar', 'id_type_kamar', 'foto', 'harga', 'deskripsi'];

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
        return $this->db->table('kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->like('no_kamar', $keyword)
            ->orLike('type_kamar', $keyword)
            ->orLike('deskripsi', $keyword)
            ->orLike('harga', $keyword)
            ->get()->getResultArray();
    }

    public function join_typeKamar()
    {
        return $this->db->table('kamar')
            ->select('*')
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->like('no_kamar')
            ->get()->getResultArray();
        // return $join->paginate(9, 'kamar');
    }

    public function typeKamar_detailKamar($id_kamar)
    {
        return $this->db->table('kamar')
            ->select('*')
            ->where('id_kamar', $id_kamar)
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->get()
            ->getResultArray();
        // return $this->db->table('kamar')->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')->where('id_kamar', $id_kamar)->get()->getResult();
    }

    public function namaFasilitas_detailKamar($id_kamar)
    {
        // return $this->db->table('kamar')
        // return $this->db->table('type_kamar')->join('fasilitas_kamar', 'fasilitas_kamar.id_fkamar = fasilitas_kamar.id_type_kamar')->where('id_kamar', $id_kamar)->get()->getResultArray();
    }
}
