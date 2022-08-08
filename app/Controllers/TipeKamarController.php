<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TipeKamarController extends BaseController
{

    public function tampiltambah_tkamar()
    {
        $data = [
            'title' => 'Tambah Tipe Kamar AuHotelia',
            'validasi' => \Config\Services::validation(),
            'dataTypeKamar' => $this->typeKamarModel->findAll()
            // 'data_typeKamar' => $this->fKamarModel->findAll()
        ];
        // dd($data);
        return view('tkamar/tambah-tkamar', $data);
    }

    public function tampiledit_tkamar($id_tkamar)
    {
        $syarat = ['type_kamar.id_type_kamar' => $id_tkamar];
        $data = [
            'title' => 'Edit Tipe Kamar AuHotelia',
            'data_tk' => $this->typeKamarModel
                ->join('fasilitas_kamar', 'type_kamar.id_type_kamar = fasilitas_kamar.id_type_kamar')
                ->where($syarat)->find(),
            'validasi' => \Config\Services::validation()
        ];
        // dd($data);
        return view('tkamar/edit-tkamar', $data);
    }

    // crud type_kamar
    public function tampiltypekamar()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $tkamar = $this->typeKamarModel->search($keyword);
        } else {
            $tkamar = $this->typeKamarModel->join_fasilitas();
        }

        $data = [
            'title' => 'Tipe Kamar AuHotelia',
            'judul' => 'Tipe Kamar',
            'tkamar' => $tkamar,
            // 'data_tk' => $this->fKamarModel->get_typeKamar(),
            'keyword' => $keyword,
        ];
        // dd(FCPATH);
        return view('tkamar/type-kamar', $data);
    }

    public function tambah_tkamar()
    {
        // // pengkondisian untuk validasi
        if (!$this->validate([
            'type_kamar' => [
                'rules' => 'required|max_length[100]|is_unique[kamar.no_kamar]',
                'errors' => [
                    'required' => 'Nomor Kamar harus diisi.',
                    'max_length' => 'Nomor Kamar terlalu panjang',
                    'is_unique' => 'Nomor Kamar sudah terdaftar.'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'numeric' => 'Yang Anda masukkan bukan angka.',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi.',
                    'is_image' => 'File yang Anda pilih bukan gambar.',
                    'mime_in' => 'Foto yang Anda pilih harus memiliki ekstensi .jpg, .png, atau .jpeg.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/tkamar/tambah')->withInput('validation', $validation);
        }

        helper(['form']);
        $tk = $this->request->getPost('type_kamar');
        $hrg = $this->request->getPost('harga');
        $fkamar = $this->request->getPost('nama_fkamar');
        $deskripsi = $this->request->getPost('deskripsi');

        //  ambil gambar
        $fileFoto = $this->request->getFile('foto');
        //  ambil nama file
        $namaFoto = $fileFoto->getRandomName();
        // pindahkan file ke folder public/gambar
        $fileFoto->move(WRITEPATH . '../public/gambar/', $namaFoto);

        $input_tk = [
            'type_kamar' => $tk,
            'harga' => $hrg,
            'foto' => $namaFoto
        ];
        $this->typeKamarModel->insert($input_tk);

        $input_fkamar = [
            'id_type_kamar' => $this->typeKamarModel->getInsertId(),
            'nama_fkamar' => $fkamar,
            'deskripsi' => $deskripsi,
        ];
        $this->fKamarModel->insert($input_fkamar);

        session()->setFlashdata('tambah_tkamar', 'Data tipe kamar berhasil ditambahkan');
        return redirect()->to('/petugas/tkamar');
    }

    public function edit_tkamar()
    {
        helper(['form']);
        $id_tk = $this->request->getPost('id_type_kamar');
        $id_fk = $this->request->getPost('id_fkamar');
        $tk = $this->request->getPost('type_kamar');
        $hrg = $this->request->getPost('harga');
        $fkamar = $this->request->getPost('nama_fkamar');
        $deskripsi = $this->request->getPost('deskripsi');
        $nama_foto_lama = $this->request->getPost('nama_foto');
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists('gambar/' . $nama_foto_lama)) {
                unlink('gambar/' . $nama_foto_lama);
            }
            $nama_foto = $file->getRandomName();
            $file->move(WRITEPATH . '../public/gambar', $nama_foto);
        } else {
            $nama_foto = $nama_foto_lama;
        }

        if ($this->request->getPost('id_fkamar')) {
            $input_tk = [
                'type_kamar' => $tk,
                'harga' => $hrg,
                'foto' => $nama_foto
            ];
            $input_fk = [
                'nama_fkamar' => $fkamar,
                'deskripsi' => $deskripsi,
            ];

            $db = \config\Database::connect();
            // update type_kamar
            $db->table('type_kamar as tk')
                ->where('id_type_kamar', $id_tk)
                ->update($input_tk);

            // update fasilitas_kamar
            $db->table('fasilitas_kamar as fk')
                ->where('id_fkamar', $id_fk)
                ->update($input_fk);

            session()->setFlashdata('edit_tkamar', 'Data tipe kamar berhasil diupdate');
            return redirect()->to('/petugas/tkamar');
        }
    }

    public function hapus_tkamar($id_tkamar)
    {
        $syarat = ['id_type_kamar' => $id_tkamar];

        $data_tk = $this->typeKamarModel->where($syarat)->find();
        $this->typeKamarModel->where('id_type_kamar', $id_tkamar)->delete();
        $file = $data_tk[0]['foto'];
        if ($file != '' && file_exists(FCPATH . 'gambar/' . $file)) {
            unlink('gambar/' . $file);
        }
        session()->setFlashdata('hapus_tkamar', 'Data tipe kamar berhasil dihapus');
        return redirect()->to('/petugas/tkamar');
    }
}
