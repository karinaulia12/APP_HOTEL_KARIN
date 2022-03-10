<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('petugas/v_login');
    }

    public function login()
    {
        $syarat = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password'))
        ];
        $dataLogin = $this->petugasModel->where($syarat)->find();
        if (count($dataLogin) == 1) {
            $session_data = [
                'username' => $dataLogin[0]['username'],
                // 'id_petugas' => $dataLogin[0]['id_petugas'],
                'nama_petugas' => $dataLogin[0]['nama_petugas'],
                'no_hp' => $dataLogin[0]['no_hp'],
                'alamat' => $dataLogin[0]['alamat'],
                'level' => $dataLogin[0]['level'],
                'sudahkahLogin' => true
            ];
            session()->set($session_data);
            if (session()->get('level') == 'admin') {
                return redirect()->to('/petugas/dashboard');
            } else {
                return redirect()->to('/resepsionis/dashboard');
            }
        } else {
            session()->setFlashdata('salahLogin', 'Username atau Password Anda salah.');
            return redirect()->to('/petugas');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function dashboard()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        $data = [
            'title' => 'Dashboard Petugas | AuHotelia',
            'hitung_kamar' => $this->kamarModel->hitung_kamar(),
            'hitung_fkamar' => $this->fKamarModel->hitung_fkamar(),
            'hitung_fumum' => $this->fUmumModel->hitung_fumum()
        ];
        return view('petugas/dashboard', $data);
    }

    // function tampilan
    public function tampiltambahkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data = [
            'title' => 'Tambah Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->findAll(),
            'dataTypeKamar' => $this->typeKamarModel->findAll(),
            'validasi' => \Config\Services::validation()
        ];
        session()->set($data);
        return view('petugas/tambah-kamar', $data);
    }

    public function tampildetailkamar($id_kamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $join_typeKamar = $this->kamarModel->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')->get()->getResultArray();

        $data = [
            'title' => 'Detail Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)->findAll(),
            // 'data_typeKamar' => $this->typeKamarModel->join_kamar_utkDetail(),
            'data_typeKamar' => $this->kamarModel->typeKamar_detailKamar($id_kamar),
            // 'data_namaFkamar' => $this->kamarModel->namaFasilitas_detailKamar(),
            'nama_fasilitas' => $this->fKamarModel->typeKamar_inDetail($id_kamar)
        ];
        session()->set($data);
        return view('petugas/detail-kamar', $data);
    }

    public function tampileditkamar($id_kamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $data = [
            'title' => 'Edit Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)->findAll(),
            'data_typekamar' => $this->typeKamarModel->findAll(),
            'data_typeKamar' => $this->kamarModel->join_typeKamar(),
            'validasi' => \Config\Services::validation()
        ];

        return view('petugas/edit-kamar', $data);
    }

    public function tampileditfotokamar($id_kamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $data = [
            'title' => 'Edit Foto Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)->find()
        ];

        return view('petugas/editFoto-kamar', $data);
    }

    public function tampilfasilitaskamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $fkamar = $this->fKamarModel->search($keyword);
        } else {
            $fkamar = $this->fKamarModel;
        }

        // $tabeljoin = $this->kamarModel->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->get()->getResultArray();

        $data = [
            'title' => 'Fasilitas Kamar AuHotelia',
            // 'dataKamar' => $tabeljoin,
            'fkamar' => $fkamar->findAll(),
            'data_tk' => $this->fKamarModel->get_typeKamar(),
            'keyword' => $keyword
        ];

        return view('petugas/fasilitas-kamar', $data);
    }

    public function tampildetail_fkamar($id_fkamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas/dashboard');
            exit;
        }

        $data = [
            'title' => 'Detail Fasilitas Kamar AuHotelia',
            'dataFkamar' => $this->fKamarModel->where('id_fkamar', $id_fkamar)->findAll()
        ];

        return view('petugas/detail-fkamar', $data);
    }

    public function tampiltambah_fkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }

        $data = [
            'title' => 'Tambah Fasilitas Kamar AuHotelia',
            'validasi' => \Config\Services::validation(),
            'data_typeKamar' => $this->fKamarModel->findAll()
        ];
        return view('petugas/tambah-fkamar', $data);
    }

    public function tampiledit_fkamar($id_fkamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }
        $data = [
            'title' => 'Edit Fasilitas Kamar AuHotelia',
            'data_fkamar' => $this->fKamarModel->where('id_fkamar', $id_fkamar)->findAll(),
            'data_noKamar' => $this->kamarModel->findAll(),
            'validasi' => \Config\Services::validation()
        ];

        return view('petugas/edit-fkamar', $data);
    }

    public function tampil_fumum()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' !== 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' !== 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }

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
        return view('petugas/fasilitas-umum', $data);
    }

    public function tampiltambah_fumum()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }

        $data = [
            'title' => 'Tambah Fasilitas Hotel AuHotelia',
            'validasi' => \Config\Services::validation()
        ];
        return view('petugas/tambah-fumum', $data);
    }

    public function tampiledit_fumum($id_fumum)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }
        $data = [
            'title' => 'Edit Fasilitas Hotel AuHotelia',
            'data_fumum' => $this->fUmumModel->where('id_fumum', $id_fumum)->findAll(),
            'validasi' => \Config\Services::validation()
        ];

        return view('petugas/edit-fumum', $data);
    }

    // crud kamar
    public function tampilKamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kamar = $this->kamarModel->search($keyword);
        } else {
            $kamar = $this->kamarModel;
        }

        $data = [
            'title' => 'Kamar AuHotelia',
            // 'dataKamar' => $this->kamarModel->findAll(),
            // 'dataKamar' => $kamar->orderBy('no_kamar', 'asc')->paginate(9, 'kamar'),
            'dataKamar' => $this->kamarModel->join_typeKamar(),
            'pager' => $this->kamarModel->pager,
            'keyword' => $keyword
        ];

        return view('petugas/tampil-kamar', $data);
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
            ],
            // 'type_kamar' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Tipe Kamar harus diisi.',
            //     ]
            // ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi.',
                    'is_image' => 'File yang Anda pilih bukan gambar.',
                    'mime_in' => 'Foto yang Anda pilih harus memiliki ekstensi .jpg, .png, atau .jpeg.'
                ]
            ],
            // 'harga' => [
            //     'rules' => 'required|is_numeric',
            //     'errors' => [
            //         'required' => 'Harga harus diisi.',
            //         'is_numeric' => 'Harga tidak boleh mengandung huruf'
            //     ]
            // ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/kamar/tambah')->withInput('validation', $validation);
        }

        helper(['form']);
        //  ambil gambar
        $fileFoto = $this->request->getFile('foto');
        //  ambil nama file
        $namaFoto = $fileFoto->getRandomName();
        // pindahkan file ke folder public/gambar
        $fileFoto->move(WRITEPATH . '../public/gambar', $namaFoto);

        $inputdata = [
            'no_kamar' => $this->request->getPost('no_kamar'),
            // 'type_kamar' => $this->request->getPost('type_kamar'),
            'id_type_kamar' => $this->request->getPost('id_type_kamar'),
            'foto' => $namaFoto,
            'deskripsi' => $this->request->getPost('deskripsi'),
            // 'harga' => $this->request->getPost('harga')
        ];

        session()->set($inputdata);
        $this->kamarModel->insert($inputdata);
        session()->setFlashdata('tambahKamar', 'Data kamar berhasil ditambahkan');
        return redirect()->to('/petugas/kamar');
    }

    public function editKamar()
    {
        if (!$this->validate([
            'no_kamar' => [
                'rules' => 'required|max_length[10]|is_unique[kamar.no_kamar]',
                'errors' => [
                    'required' => 'Nomor Kamar harus diisi.',
                    'max_length' => 'Nomor Kamar terlalu panjang',
                    'is_unique' => 'Nomor Kamar sudah terdaftar.'
                ]
            ],
            'type_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tipe Kamar harus diisi.',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Foto harus diisi.',
                    'is_image' => 'File yang Anda pilih bukan gambar.',
                    'mime_in' => 'Foto yang Anda pilih harus memiliki ekstensi .jpg, .png, atau .jpeg.'
                ]
            ],
            'harga' => [
                'rules' => 'required|is_numeric',
                'errors' => [
                    'required' => 'Harga harus diisi.',
                    'is_numeric' => 'Harga tidak boleh mengandung huruf'
                ]
            ]
        ])) {
            $id_kamar = $this->request->getPost('id_kamar');
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/kamar/edit/' . $id_kamar)->withInput('validation', $validation);
        }

        if ($this->request->getPost('no_kamar')) {
            $inputdata = [
                'type_kamar' => $this->request->getPost('type_kamar'),
                'harga'      => $this->request->getPost('harga'),
                'deskripsi'  => $this->request->getPost('deskripsi')
            ];
            session()->set($inputdata);
            $this->kamarModel->update($this->request->getPost('no_kamar'), $inputdata);
            session()->setFlashdata('editKamar', 'Data kamar berhasil diupdate');
            return redirect()->to('/petugas/kamar');
        }
    }

    public function editKamar1()
    {
        $no_kamar = $this->request->getPost('no_kamar');
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

        $data = [
            'id_type_kamar' => $this->request->getPost('type_kamar'),
            'foto' => $nama_foto,
            'deskripsi' => $this->request->getPost('deskripsi'),
            // 'harga' => $this->request->getPost('harga')
        ];

        $this->kamarModel->update($no_kamar, $data);
        return redirect()->to('/petugas/kamar')->with('editKamar', 'Data kamar berhasil diupdate');
    }

    // public function editFotoKamar()
    // {
    //     if (!session()->get('sudahkahLogin')) {
    //         return redirect()->to('/petugas');
    //         exit;
    //     }

    //     if (session()->get('level' != 'admin')) {
    //         return redirect()->to('/petugas');
    //         exit;
    //     }

    //     if (session()->get('level' != 'admin')) {
    //         return redirect()->to('/petugas/dashboard');
    //         exit;
    //     }

    //     helper(['form']);
    //     $id = $this->request->getPost('id_kamar');
    //     $syarat = $this->request->getPost('nama_foto');
    //     unlink('gambar/' . $syarat);
    //     $upload = $this->request->getFile('foto');
    //     // $namaFoto = $upload->getRandomName();
    //     $upload->move(WRITEPATH . '../public/gambar');
    //     $data = [
    //         'foto' => $upload->getName()
    //     ];
    //     $this->kamarModel->update($id, $data);
    //     session()->setFlashdata('editFotoKamar', 'Foto Kamar berhasil diupdate.');
    //     return redirect()->to('/petugas/kamar');
    // }

    public function hapusKamar($id_kamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit;
        }
        $syarat = ['id_kamar' => $id_kamar];
        $dataKamar = $this->kamarModel->where($syarat)->find();
        // hapus foto
        unlink('gambar/' . $dataKamar[0]['foto']);
        $this->kamarModel->where('id_kamar', $id_kamar)->delete();
        session()->setFlashdata('hapusKamar', 'Data Kamar berhasil dihapus');
        return redirect()->to('/petugas/kamar');
    }

    // crud fasilitas kamar
    public function tambah_fkamar()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }

        if (!$this->validate([
            'nama_fkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Kamar harus diisi.'
                ]
            ],
            'type_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Kamar harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/fkamar/tambah')->with('validation', $validation);
        }
        helper(['form']);
        $inputdata = [
            'nama_fkamar' => $this->request->getPost('nama_fkamar'),
            'type_kamar' => $this->request->getPost('type_kamar')
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

        if ($this->request->getPost('id_fkamar')) {
            $inputdata = [
                'nama_fkamar' => $this->request->getPost('nama_fkamar'),
                // 'foto' => $upload->getName(),
                'type_kamar' => $this->request->getPost('type_kamar')
            ];
            session()->set($inputdata);
            $this->fKamarModel->update($id_fkamar, $inputdata);
            session()->setFlashdata('edit_fkamar', 'Data fasilitas hotel berhasil diupdate');
            return redirect()->to('/petugas/fkamar');
        }
    }

    public function hapus_fkamar($id_fkamar)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit;
        }
        $syarat = ['id_fkamar' => $id_fkamar];
        $this->fKamarModel->where($syarat)->find();
        $this->fKamarModel->where('id_fkamar', $id_fkamar)->delete();
        session()->setFlashdata('hapus_fkamar', 'Data Kamar berhasil dihapus');
        return redirect()->to('/petugas/fkamar');
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
            return redirect()->to('/petugas/fumum/tambah')->with('validation', $validation);
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

    public function edit_fumum()
    {
        $id_fumum = $this->request->getPost('id_fumum');
        $nama_foto_lama = $this->request->getPost('nama_foto_fumum');

        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            if (file_exists('gambar/' . $nama_foto_lama)) {
                unlink('gambar/' . $nama_foto_lama);
            }
            $nama_foto_fumum = $file->getRandomName();
            $file->move(WRITEPATH . '../public/gambar', $nama_foto_fumum);
        } else {
            $nama_foto_fumum = $nama_foto_lama;
        }

        $data = [
            'nama_fumum' => $this->request->getPost('nama_fumum'),
            'foto' => $nama_foto_fumum,
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        $this->fUmumModel->update($id_fumum, $data);
        session()->setFlashdata('edit_fumum', 'Data fasilitas hotel berhasil diupdate');
        return redirect()->to('/petugas/fumum');
    }

    public function hapus_fumum($id_fumum)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit;
        }
        helper(['form']);
        $syarat = ['id_fumum' => $id_fumum];
        $data_fumum = $this->fUmumModel->where($syarat)->find();
        unlink('gambar/', $data_fumum[0]['foto']);
        $this->fUmumModel->where('id_fumum', $id_fumum)->delete();
        session()->setFlashdata('hapus_fumum', 'Data fasilitas hotel berhasil dihapus');
    }
}
