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
    protected $allowedFields    = ['id_reservasi', 'nama_pemesan', 'nama_tamu', 'no_telp', 'email', 'nik', 'checkin', 'checkout', 'harga', 'jml_kamar', 'total', 'status'];

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
            ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->groupBy('reservasi_kamar.id_reservasi')
            ->orderBy('checkin', 'desc')
            // ->join('tamu', 'tamu.nik = reservasi.nik')
            ->get()->getResultArray();
    }

    public function join_utk_pdf($id_rsv)
    {
        return $this->db->table('reservasi')
            ->select('*')
            ->where('id_reservasi', $id_rsv)
            ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->join('tamu', 'tamu.nik = reservasi.nik')
            ->get()->getResultArray();
    }

    public function get_id($id)
    {
        return $this->db->table('reservasi')
            ->select('id_reservasi')
            ->where('id_reservasi', $id)
            ->get()->getLastRow();
    }

    public function search($keyword)
    {
        return $this->db->table('reservasi')
            // ->join('tamu', 'tamu.nik = reservasi.nik')
            ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
            ->like('reservasi.nama_tamu', $keyword)
            ->orLike('checkin', $keyword)
            ->orLike('reservasi_kamar.id_kamar', $keyword)
            ->orderBy('checkin', 'desc')
            ->groupBy('reservasi_kamar.id_reservasi')
            ->get()->getResultArray();
    }

    public function detail_rsv($id_rsv)
    {
        return $this->db->table('reservasi')
            ->select('*')
            ->where('reservasi.nik', $id_rsv)
            ->join('reservasi_kamar', 'reservasi.id_reservasi = reservasi_kamar.id_reservasi')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->get()->getResultArray();
    }
}
