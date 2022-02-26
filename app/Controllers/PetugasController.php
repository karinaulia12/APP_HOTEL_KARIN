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
            return redirect()->to('/petugas/dashboard');
        } else {
            return redirect('/petugas');
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
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        $data = [
            'title' => 'Dashboard Petugas | AuHotelia',
            'hitung_kamar' => $this->kamarModel->hitung_kamar()
        ];
        return view('petugas/dashboard', $data);
    }

    // function tampilan
    public function tampiltambahkamar()
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
            'title' => 'Tambah Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->find(),
            'validasi' => \Config\Services::validation()
        ];
        session()->set($data);
        return view('petugas/tambah-kamar', $data);
    }

    public function tampildetailkamar($id_kamar)
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

        // $join_fkamar = $this->kamarModel->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->where('id_kamar', $id_kamar)->get()->result();

        $data = [
            'title' => 'Detail Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)->findAll()
            // 'data_fkamar' => $join_fkamar
        ];
        session()->set($data);
        return view('petugas/detail-kamar', $data);
    }

    public function tampileditkamar($id_kamar)
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
            'title' => 'Edit Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)->findAll(),
            'validasi' => \Config\Services::validation()
        ];

        return view('petugas/edit-kamar', $data);
    }

    public function tampileditfotokamar($id_kamar)
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
            'title' => 'Edit Foto Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)->find()
        ];

        return view('petugas/editFoto-kamar', $data);
    }

    public function tampilfasilitaskamar()
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
        // $tabeljoin = $this->kamarModel->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->get()->getResultArray();
        $tabeljoin = $this->kamarModel->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->get()->getResultArray();

        $data = [
            'title' => 'Fasilitas Kamar AuHotelia',
            'dataKamar' => $tabeljoin,
            'fkamar' => $this->fKamarModel->findAll()
        ];

        return view('petugas/fasilitas-kamar', $data);
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
        // $join = $this->kamarModel->join('fasilitas_kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')->getResultArray();
        // $join = $this->fKamarModel->join('kamar', 'fasilitas_kamar.id_kamar = kamar.id_kamar')->get();

        $data = [
            'title' => 'Tambah Fasilitas Kamar AuHotelia',
            'validasi' => \Config\Services::validation(),
            'data_noKamar' => $this->kamarModel->findAll()
            // 'data_noKamar' => $join
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

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect('/petugas/dashboard');
            exit;
        }

        $data = [
            'title' => 'Fasilitas Hotel AuHotelia',
            // 'data_fumum' => $this->fUmumModel->findAll()
            'data_fumum' => $this->fUmumModel->paginate(10, 'fasilitas_umum'),
            'pager' => $this->fUmumModel->pager
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
        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kamar = $this->kamarModel->search($keyword);
        } else {
            $kamar = $this->kamarModel;
        }
        // $halaman = $this->request->getVar('page_kamar') ? $this->request->getVar('page_kamar') : 1;
        $data = [
            'title' => 'Kamar AuHotelia',
            // 'dataKamar' => $this->kamarModel->findAll(),
            'dataKamar' => $kamar->paginate(8, 'kamar'),
            'pager' => $this->kamarModel->pager,
            'keyword' => $keyword
        ];

        return view('petugas/tampil-kamar', $data);
    }

    public function tambahKamar()
    {
        // variabel untuk validasi
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
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/kamar/tambah')->with('validation', $validation);
        }

        helper(['form']);
        //  ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // pindahkan file ke folder public/gambar
        $fileFoto->move(WRITEPATH . '../public/gambar');
        //  ambil nama file
        $namaFoto = $fileFoto->getName();

        $inputdata = [
            'no_kamar' => $this->request->getPost('no_kamar'),
            'type_kamar' => $this->request->getPost('type_kamar'),
            'foto' => $namaFoto,
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga')
        ];

        session()->set($inputdata);
        $this->kamarModel->insert($inputdata);
        session()->setFlashdata('tambahKamar', 'Data kamar berhasil ditambahkan');
        return redirect()->to('/petugas/kamar');
    }

    public function editKamar()
    {
        if ($this->request->getPost('no_kamar')) {
            $inputdata = [
                // 'no_kamar' => $this->request->getPost('no_kamar'),
                'type_kamar' => $this->request->getPost('type_kamar'),
                'harga' => $this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];
            session()->set($inputdata);
            $this->kamarModel->update($this->request->getPost('no_kamar'), $inputdata);
            session()->setFlashdata('editKamar', 'Data kamar berhasil diupdate');
            return redirect()->to('/petugas/kamar');
        }
    }

    public function editFotoKamar()
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

        helper(['form']);
        $syarat = $this->request->getPost('foto');
        unlink('gambar/' . $syarat);
        $upload = $this->request->getFile('foto');
        $upload->move(WRITEPATH . '..public/gambar/');
        $data = [
            'foto' => $upload->getName(),
        ];
        $this->kamarModel->update($this->request->getPost('no_kamar'), $data);
        session()->setFlashdata('editFotoKamar', 'Foto Kamar berhasil diupdate.');
        return redirect()->to('/petugas/kamar');
    }

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
        if (!$this->validate([
            'nama_fkamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fasilitas Kamar harus diisi.'
                ]
            ],
            'no_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Kamar harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/petugas/kamar/tambah')->with('validation', $validation);
        }

        helper(['form']);

        $inputdata = [
            'nama_fkamar' => $this->request->getPost('nama_fkamar'),
            'no_kamar' => $this->request->getPost('no_kamar')
        ];

        session()->set($inputdata);
        $this->fKamarModel->insert($inputdata);
        session()->setFlashdata('tambahFkamar', 'Data fasilitas kamar berhasil ditambahkan');
        return redirect()->to('/petugas/fkamar');
    }

    public function edit_fkamar()
    {
        helper(['form']);

        if ($this->request->getPost('nama_fkamar')) {
            $inputdata = [
                'nama_fkamar' => $this->request->getPost('nama_fkamar'),
                // 'foto' => $upload->getName(),
                'id_kamar' => $this->request->getPost('id_kamar')
            ];
            session()->set($inputdata);
            $this->fKamarModel->update($this->request->getPost('nama_fkamar'), $inputdata);
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
        $dataFkamar = $this->fKamarModel->where($syarat)->find();
        // hapus foto
        unlink('gambar/' . $dataFkamar[0]['foto']);
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
        $fileFoto->move(WRITEPATH . '../public/gambar');
        $inputdata = [
            'nama_fumum' => $this->request->getPost('nama_fumum'),
            'foto' => $fileFoto->getName(),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        session()->set($inputdata);
        $this->fUmumModel->insert($inputdata);
        session()->setFlashdata('tambah_fumum', 'Data fasilitas hotel berhasil ditambahkan');
        return redirect()->to('/petugas/fumum');
    }

    public function edit_fumum()
    {
        helper(['form']);
        $syarat = $this->request->getPost('foto');
        unlink('gambar/' . $syarat);
        $upload = $this->request->getFile('foto');
        $upload->move(WRITEPATH . '..public/gambar/');

        if ($this->request->getPost('nama_fumum') || $syarat) {
            $inputdata = [
                'nama_fumum' => $this->request->getPost('nama_fumum'),
                'foto' => $upload->getName(),
                'deskripsi' => $this->request->getPost('deskripsi')
            ];
            session()->set($inputdata);
            $this->fUmumModel->update($this->request->getPost('nama_fumum'), $inputdata);
            session()->setFlashdata('edit_fumum', 'Data fasilitas hotel berhasil diupdate');
            return redirect()->to('/petugas/fumum');
        }
    }
}
