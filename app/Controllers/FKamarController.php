<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FKamarController extends BaseController
{
    public function tampilfasilitaskamar()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $fkamar = $this->fKamarModel->search($keyword);
        } else {
            $fkamar = $this->fKamarModel->get_typeKamar();
        }

        // $tabeljoin = $this->kamarModel->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->get()->getResultArray();

        $data = [
            'title' => 'Fasilitas Kamar AuHotelia',
            // 'dataKamar' => $tabeljoin,
            'fkamar' => $fkamar,
            'data_tk' => $this->fKamarModel->get_typeKamar(),
            'keyword' => $keyword
        ];

        return view('fkamar/fasilitas-kamar', $data);
    }

    public function tampildetail_fkamar($id_fkamar)
    {
        $data = [
            'title' => 'Detail Fasilitas Kamar AuHotelia',
            // 'dataFkamar' => $this->fKamarModel->where('id_fkamar', $id_fkamar)->findAll()
            'dataFkamar' => $this->fKamarModel->detail_fkamar($id_fkamar)
        ];

        return view('fkamar/detail-fkamar', $data);
    }

    public function tampiltambah_fkamar()
    {
        $data = [
            'title' => 'Tambah Fasilitas Kamar AuHotelia',
            'validasi' => \Config\Services::validation(),
            'dataTypeKamar' => $this->typeKamarModel->findAll()
            // 'data_typeKamar' => $this->fKamarModel->findAll()
        ];
        return view('fkamar/tambah-fkamar', $data);
    }

    public function tampiledit_fkamar($id_fkamar)
    {
        $data = [
            'title' => 'Edit Fasilitas Kamar AuHotelia',
            'data_fkamar' => $this->fKamarModel->where('id_fkamar', $id_fkamar)
                ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->get()->getResultArray(),
            'fkamar' => $this->fKamarModel
                ->join('type_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->orderBy('harga', 'asc')
                ->get()->getResultArray(),
            'data_tk' => $this->fKamarModel->get_typeKamar(),
            'validasi' => \Config\Services::validation()
        ];

        return view('fkamar/edit-fkamar', $data);
    }

    // crud fasilitas kamar
    public function tambah_fkamar()
    {

        if (!$this->validate([
            'nama_fkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Kamar harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/fkamar/tambah')->withInput('validation', $validation);
        }
        helper(['form']);
        $inputdata = [
            'nama_fkamar' => $this->request->getPost('nama_fkamar'),
            'id_type_kamar' => $this->request->getPost('id_type_kamar')
        ];

        session()->set($inputdata);
        $this->fKamarModel->insert($inputdata);
        session()->setFlashdata('tambahFkamar', 'Data fasilitas kamar berhasil ditambahkan');
        return redirect()->to('/petugas/fkamar');
    }

    public function edit_fkamar()
    {
        helper(['form']);
        $id_fkamar = $this->request->getPost('id_fkamar');
        $id_tk = $this->request->getPost('id_tk');

        if ($this->request->getPost('id_fkamar')) {
            $inputdata = [
                'nama_fkamar' => $this->request->getPost('nama_fkamar'),
                // 'foto' => $upload->getName(),
                'id_type_kamar' => $this->request->getPost('type_kamar'),
                'stok_kamar' => $this->request->getPost('stok_kamar')
            ];
            session()->set($inputdata);
            $db = \config\Database::connect();
            // update fasilitas_kamar
            $db->table('fasilitas_kamar as fk')
                ->where('id_fkamar', $id_fkamar)
                // ->where('id_type_kamar', )
                ->set('fk.nama_fkamar', $this->request->getPost('nama_fkamar'))
                ->set('fk.id_type_kamar', $this->request->getPost('type_kamar'))
                ->update();

            // update stok pada type_kamar
            $db->table('type_kamar as tk')
                ->where('id_type_kamar', $id_tk)
                ->set('tk.stok_kamar', $this->request->getPost('stok_kamar'))
                ->update();

            session()->setFlashdata('edit_fkamar', 'Data fasilitas hotel berhasil diupdate');
            return redirect()->to('/petugas/fkamar');
        }
    }

    public function hapus_fkamar($id_fkamar)
    {
        $syarat = ['id_fkamar' => $id_fkamar];
        $this->fKamarModel->where($syarat)->find();
        $this->fKamarModel->where('id_fkamar', $id_fkamar)->delete();
        session()->setFlashdata('hapus_fkamar', 'Data Kamar berhasil dihapus');
        return redirect()->to('/petugas/fkamar');
    }
}
