<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FUmumController extends BaseController
{

    public function tampil_fumum()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $fumum = $this->fUmumModel->search($keyword);
        } else {
            $fumum = $this->fUmumModel;
        }

        $data = [
            'title' => 'Fasilitas Hotel AuHotelia',
            // 'data_fumum' => $this->fUmumModel->findAll()
            'data_fumum' => $fumum->paginate(10, 'fasilitas_umum'),
            'pager' => $this->fUmumModel->pager,
            'keyword' => $keyword
        ];
        return view('fumum/fasilitas-umum', $data);
    }

    public function tampiltambah_fumum()
    {
        $data = [
            'title' => 'Tambah Fasilitas Hotel AuHotelia',
            'validasi' => \Config\Services::validation()
        ];
        return view('fumum/tambah-fumum', $data);
    }

    public function tampiledit_fumum($id_fumum)
    {
        $data = [
            'title' => 'Edit Fasilitas Hotel AuHotelia',
            'data_fumum' => $this->fUmumModel->where('id_fumum', $id_fumum)->findAll(),
            'validasi' => \Config\Services::validation()
        ];

        return view('fumum/edit-fumum', $data);
    }


    // crud fasilitas hotel
    public function tambah_fumum()
    {
        if (!$this->validate([
            'nama_fumum' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Kamar harus diisi.'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi.',
                    'is_image' => 'File yang Anda upload bukan gambar'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/fumum/tambah')->withInput('validation', $validation);
        }

        helper(['form']);
        $fileFoto = $this->request->getFile('foto');
        $nama_foto = $fileFoto->getRandomName();
        $fileFoto->move(WRITEPATH . '../public/gambar', $nama_foto);
        $inputdata = [
            'nama_fumum' => $this->request->getPost('nama_fumum'),
            'foto' => $nama_foto,
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        session()->set($inputdata);
        $this->fUmumModel->insert($inputdata);
        session()->setFlashdata('tambah_fumum', 'Data fasilitas hotel berhasil ditambahkan');
        return redirect()->to('/petugas/fumum');
    }

    public function edit_fumum($id_fumum)
    {
        helper(['form']);
        $id_fumum = $this->request->getPost('id_fumum');
        $syarat = [
            'id_fumum' => $id_fumum
        ];
        $nama_foto_lama = $this->request->getPost('nama_foto_fumum');

        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists('gambar/' . $nama_foto_lama)) {
                unlink('gambar/' . $nama_foto_lama);
            }
            $nama_foto_fumum = $file->getRandomName();
            $file->move(WRITEPATH . '../public/gambar/', $nama_foto_fumum);
        } else {
            $nama_foto_fumum = $nama_foto_lama;
        }

        $data = [
            'nama_fumum' => $this->request->getPost('nama_fumum'),
            'foto' => $nama_foto_fumum,
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        // d($data);
        $this->fUmumModel->where($syarat)->set($data)->update();
        session()->setFlashdata('edit_fumum', 'Data fasilitas hotel berhasil diupdate');
        return redirect()->to('/petugas/fumum');
    }

    public function hapus_fumum($id_fumum)
    {
        helper(['form']);
        $syarat = ['id_fumum' => $id_fumum];
        $data_fumum = $this->fUmumModel->where($syarat)->find();
        unlink('gambar/' . $data_fumum[0]['foto']);
        $this->fUmumModel->where('id_fumum', $id_fumum)->delete();
        session()->setFlashdata('hapus_fumum', 'Data fasilitas hotel berhasil dihapus');
        return redirect()->to('/petugas/fumum');
    }
}
