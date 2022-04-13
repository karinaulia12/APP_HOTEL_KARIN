<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('petugas/v_login');
    }

    public function __construct()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        if (session()->get('level' != 'admin')) {
            return redirect()->to('/petugas');
            exit;
        }
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
        // $join_typeKamar = $this->kamarModel->join('type_kamar', 'type_kamar.id_type_kamar = kamar.id_type_kamar')->get()->getResultArray();

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
        $data = [
            'title' => 'Edit Foto Kamar AuHotelia',
            'dataKamar' => $this->kamarModel->where('id_kamar', $id_kamar)->find()
        ];

        return view('petugas/editFoto-kamar', $data);
    }

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

        return view('petugas/fasilitas-kamar', $data);
    }

    public function tampildetail_fkamar($id_fkamar)
    {
        $data = [
            'title' => 'Detail Fasilitas Kamar AuHotelia',
            // 'dataFkamar' => $this->fKamarModel->where('id_fkamar', $id_fkamar)->findAll()
            'dataFkamar' => $this->fKamarModel->detail_fkamar($id_fkamar)
        ];

        return view('petugas/detail-fkamar', $data);
    }

    public function tampiltambah_fkamar()
    {
        $data = [
            'title' => 'Tambah Fasilitas Kamar AuHotelia',
            'validasi' => \Config\Services::validation(),
            'dataTypeKamar' => $this->typeKamarModel->findAll()
            // 'data_typeKamar' => $this->fKamarModel->findAll()
        ];
        return view('petugas/tambah-fkamar', $data);
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

        return view('petugas/edit-fkamar', $data);
    }

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
        return view('petugas/fasilitas-umum', $data);
    }

    public function tampiltambah_fumum()
    {

        $data = [
            'title' => 'Tambah Fasilitas Hotel AuHotelia',
            'validasi' => \Config\Services::validation()
        ];
        return view('petugas/tambah-fumum', $data);
    }

    public function tampiledit_fumum($id_fumum)
    {
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
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $kamar = $this->kamarModel->search($keyword);
        } else {
            $kamar = $this->kamarModel->join_typeKamar();
        }

        $data = [
            'title' => 'Kamar AuHotelia',
            // 'dataKamar' => $this->kamarModel->findAll(),
            // 'dataKamar' => $kamar->orderBy('no_kamar', 'asc')->paginate(9, 'kamar'),
            'dataKamar' => $kamar,
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
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        // dd($data);
        $this->kamarModel->update($no_kamar, $data);
        return redirect()->to('/petugas/kamar')->with('editKamar', 'Data kamar berhasil diupdate');
    }

    public function hapusKamar($id_kamar)
    {
        $syarat = ['id_kamar' => $id_kamar];
        $dataKamar = $this->kamarModel->where($syarat)->find();

        $file = $dataKamar[0]['foto'];
        // if ($file->isValid() && !$file->hasMoved()) {
        if (file_exists('gambar/' . $file)) {
            unlink('gambar/' . $file);
        }
        // }
        // hapus foto
        // unlink('gambar/' . $dataKamar[0]['foto']);
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

    public function edit_fumum()
    {
        helper(['form']);
        $id_fumum = $this->request->getPost('id_fumum');
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

        if ($id_fumum) {
            $data = [
                'nama_fumum' => $this->request->getPost('nama_fumum'),
                'foto' => $nama_foto_fumum,
                'deskripsi' => $this->request->getPost('deskripsi')
            ];
        }
        // dd($data);
        $this->fUmumModel->update($id_fumum, $data);
        session()->setFlashdata('edit_fumum', 'Data fasilitas hotel berhasil diupdate');
        return redirect()->to('/petugas/fumum');
    }

    public function hapus_fumum($id_fumum)
    {
        helper(['form']);
        $syarat = ['id_fumum' => $id_fumum];
        $data_fumum = $this->fUmumModel->where($syarat)->find();
        unlink('gambar/', $data_fumum[0]['foto']);
        $this->fUmumModel->where('id_fumum', $id_fumum)->delete();
        session()->setFlashdata('hapus_fumum', 'Data fasilitas hotel berhasil dihapus');
    }
}
