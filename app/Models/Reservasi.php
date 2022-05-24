<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservasi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reservasi';
    protected $primaryKey       = 'id_reservasi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_reservasi', 'id_type_kamar',  'nama_pemesan', 'nama_tamu', 'no_telp', 'email', 'nik', 'checkin', 'checkout', 'harga', 'jml_kamar', 'total', 'status'];

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

    public function jml_reservasi()
    {
        return $this->table('reservasi')->countAll();
    }

    public function join_tabel()
    {
        return $this->db->table('reservasi')
            ->select('*')
            ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
            ->join('kamar', 'kamar.id_type_kamar = type_kamar.id_type_kamar')
            ->groupBy('reservasi.nik')
            ->orderBy('checkin', 'desc')
            ->get()->getResultArray();
    }

    public function get_id($id)
    {
        return $this->db->table('reservasi')
            ->select('id_reservasi')
            ->where('id_reservasi', $id)
            ->get()->getLastRow();
    }

    // public function search($keyword)
    // {
    //     return $this->db->table('reservasi')
    //         ->like('reservasi.nama_tamu', $keyword)
    //         ->orLike('checkin', $keyword)
    //         ->get()->getResultArray();
    // }
    public function search($keyword)
    {
        return $this->db->table('reservasi')
            ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
            ->join('kamar', 'kamar.id_type_kamar = type_kamar.id_type_kamar')
            ->like('reservasi.nama_tamu', $keyword)
            ->orLike('checkin', $keyword)
            ->orLike('type_kamar', $keyword)
            ->orderBy('checkin', 'desc')
            ->groupBy('nik')
            ->get()->getResultArray();
    }

    public function get_status($id_rsv)
    {
        return $this->db->table('reservasi')
            ->select('status')
            ->where('reservasi.id_reservasi', $id_rsv)
            ->get()->getResultArray();
    }

    public function get_id_kamar_pending($id_reservasi)
    {
        return $this->db->table('reservasi')
            ->select('id_kamar, id_reservasi, jml_kamar, no_kamar')
            ->where('id_reservasi', $id_reservasi)
            ->where('status_kmr', 'tersedia')
            ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
            ->join('kamar', 'kamar.id_type_kamar = type_kamar.id_type_kamar')
            ->get()->getResultArray();
    }
    public function get_id_kamar_checkin($id_reservasi)
    {
        return $this->db->table('reservasi')
            ->select('id_kamar, id_reservasi, jml_kamar, no_kamar')
            ->where('id_reservasi', $id_reservasi)
            ->where('status_kmr', 'dipesan')
            ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
            ->join('kamar', 'kamar.id_type_kamar = type_kamar.id_type_kamar')
            ->get()->getResultArray();
    }
    public function get_id_kamar_checkout($id_reservasi)
    {
        return $this->db->table('reservasi')
            ->select('id_kamar, id_reservasi, jml_kamar, no_kamar')
            ->where('id_reservasi', $id_reservasi)
            ->where('status_kmr', 'ditempati')
            ->join('type_kamar', 'type_kamar.id_type_kamar = reservasi.id_type_kamar')
            ->join('kamar', 'kamar.id_type_kamar = type_kamar.id_type_kamar')
            ->get()->getResultArray();
    }
}
