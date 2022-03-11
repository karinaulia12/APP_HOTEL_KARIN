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
    protected $allowedFields    = ['id_reservasi', 'nik', 'checkin', 'checkout', 'jml_kamar', 'total', 'status'];

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
            ->join('tamu', 'tamu.nik = reservasi.nik')
            ->get()->getResultArray();
    }

    public function search($keyword)
    {
        return $this->table('reservasi')->like('nik', $keyword)->orLike('checkout', $keyword)->orLike('checkin', $keyword)->orLike('jml_kamar', $keyword)->orLike('total', $keyword)->orLike('status', $keyword);
    }

    public function detail_rsv($id)
    {
        return $this->db->table('reservasi')
            ->select('*')
            ->where('id_reservasi', $id)
            ->join('reservasi_kamar', 'reservasi_kamar.id_reservasi = reservasi.id_reservasi')
            ->join('kamar', 'kamar.id_kamar = reservasi_kamar.id_kamar')
            ->join('tamu', 'tamu.nik = reservasi.nik')
            ->get()->getResultArray();
    }
}
