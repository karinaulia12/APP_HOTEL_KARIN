<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KamarController extends BaseController
{
    // function tampilan
    public function tampiltambahkamar()
    {
        $data = [
            'title' => 'Tambah Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->findAll(),
            'dataTypeKamar' => $this->typeKamarModel->findAll(),
            'validasi' => \Config\Services::validation()
        ];
        session()->set($data);
        return view('kamar/tambah-kamar', $data);
    }

    public function tampildetailkamar($id_kamar)
    {
        $data = [
            'title' => 'Detail Kamar AuHotelia',
            'judul' => 'Detail Kamar',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->findAll(),
            'data_typeKamar' => $this->kamarModel->typeKamar_detailKamar($id_kamar),
            'nama_fasilitas' => $this->fKamarModel->typeKamar_inDetail($id_kamar)
        ];
        return view('kamar/detail-kamar', $data);
    }

    public function tampileditkamar($id_kamar)
    {
        $data = [
            'title' => 'Edit Kamar AuHotelia',
            'judul' => 'Edit Kamar',
            'dataKamar' => $this->kamarModel
                ->where('id_kamar', $id_kamar)
                ->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')
                ->findAll(),
            'data_typekamar' => $this->typeKamarModel->findAll(),
            'data_typeKamar' => $this->kamarModel->join_typeKamar(),
            'validasi' => \Config\Services::validation()
        ];
        // dd($data);
        return view('kamar/edit-kamar', $data);
    }

    // crud kamar
    public function tampilKamar()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kamar = $this->kamarModel->search($keyword);
        } else {
            $kamar = $this->kamarModel
                ->join("{$this->typeKamarModel->table}", "{$this->typeKamarModel->table}.id_type_kamar = kamar.id_type_kamar")
                ->orderBy('no_kamar', 'asc')
                ->get()->getResultArray();
        }

        $data = [
            'title' => 'Kamar AuHotelia',
            'judul' => 'Data Kamar',
            'kamar' => $kamar,
            'pager' => $this->kamarModel->pager,
            'keyword' => $keyword,
            'dataKamar' => $this->kamarModel->findAll(),
            'dataTypeKamar' => $this->typeKamarModel->findAll(),
            'validasi' => \Config\Services::validation(),
            'action' => site_url('PetugasController/tampilKamar'),
        ];
        // dd($data);
        return view('kamar/tampil-kamar', $data);
    }

    public function tambahKamar()
    {
        // pengkondisian untuk validasi
        if (!$this->validate([
            'no_kamar' => [
                'rules' => 'required|max_length[10]|is_unique[kamar.no_kamar]',
                'errors' => [
                    'required' => 'Nomor Kamar harus diisi.',
                    'max_length' => 'Nomor Kamar terlalu panjang',
                    'is_unique' => 'Nomor Kamar sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/kamar/tambah')->withInput('validation', $validation);
        }

        helper(['form']);
        $inputdata = [
            'no_kamar' => $this->request->getPost('no_kamar'),
            'id_type_kamar' => $this->request->getPost('id_type_kamar'),
        ];

        session()->set($inputdata);
        $this->kamarModel->insert($inputdata);
        session()->setFlashdata('tambahKamar', 'Data kamar berhasil ditambahkan');
        return redirect()->to('/petugas/kamar');
    }

    public function editKamar1()
    {
        $id_kamar = $this->request->getPost('id_kamar');
        $no_kamar = $this->request->getPost('no_kamar');
        $syarat = ['id_kamar' => $id_kamar];

        $data = [
            'no_kamar' => $no_kamar,
            'id_type_kamar' => $this->request->getPost('type_kamar'),
            // 'deskripsi' => $this->request->getPost('deskripsi')
        ];
        // dd($data);
        $this->kamarModel->where($syarat)->set($data)->update();
        return redirect()->to('/petugas/kamar')->with('editKamar', 'Data kamar berhasil diupdate');
    }

    public function hapusKamar($id_kamar)
    {
        $syarat = ['id_kamar' => $id_kamar];
        $dataKamar = $this->kamarModel->where($syarat)
            ->find();

        $this->kamarModel->where($syarat)->delete();
        session()->setFlashdata('hapusKamar', 'Data Kamar berhasil dihapus');
        return redirect()->to('/petugas/kamar');
    }
}
