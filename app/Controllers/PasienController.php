<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\RMModel;
use App\Models\JeniskelaminModel;
use App\Models\AgamaModel;
use App\Models\PendidikanModel;
use App\models\ObatModel;
use App\models\Resep;
use App\Models\ResumePasienModel;
use App\Models\PembayaranModel;
use App\Models\UserModel;

class PasienController extends BaseController
{
    protected $pasienModel;
    protected $rekamMedisModel;
    protected $jenisKelaminModel;
    protected $agamaModel;
    protected $pendidikanModel;
    protected $obatModel;
    protected $resepModel;
    protected $resumePasienModel;
    protected $pembayaranModel;
    protected $userModel;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->rekamMedisModel = new RMModel();
        $this->jenisKelaminModel = new JeniskelaminModel();
        $this->agamaModel = new AgamaModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->obatModel = new ObatModel();
        $this->resepModel = new Resep();
        $this->resumePasienModel = new ResumePasienModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $pasien = $this->pasienModel
            ->select('pasien.*, jenis_kelamin.nama_jenis_kelamin, agama.nama_agama, pendidikan.nama_pendidikan')
            ->join('jenis_kelamin', 'jenis_kelamin.id_jenis_kelamin = pasien.jenis_kelamin_id', 'left')
            ->join('agama', 'agama.id_agama = pasien.agama_id', 'left')
            ->join('pendidikan', 'pendidikan.id_pendidikan = pasien.pendidikan_id', 'left')
            ->findAll();

        // Loop untuk menambahkan rekam medis per pasien
        foreach ($pasien as &$p) {
            $rekam_medis = $this->rekamMedisModel
                ->select('rekam_medis.*, tindakan.nama_tindakan')
                ->join('tindakan', 'tindakan.id_tindakan = rekam_medis.tindakan_id', 'left')
                ->where('rekam_medis.pasien_id', $p['id_pasien'])
                ->orderBy('tanggal_periksa', 'DESC')
                ->findAll();

            foreach ($rekam_medis as &$rm) {
                $resep = $this->resepModel
                    ->select('resep.*, obat.nama_obat, obat.harga')
                    ->join('obat', 'obat.id_obat = resep.obat_id', 'left')
                    ->where('rm_id', $rm['id_rm'])
                    ->findAll();

                $rm['resep'] = $resep;
            }

            $p['rekam_medis'] = $rekam_medis;
        }


        $data = [
            'tittle' => 'Data Pasien',
            'pasien' => $pasien,
            'jenis_kelamin' => $this->jenisKelaminModel->findAll(),
            'agama' => $this->agamaModel->findAll(),
            'pendidikan' => $this->pendidikanModel->findAll(),
            // 'resepPerRM' => $resepPerPasien,
        ];

        return view('pasien/data_pasien', $data);
    }


    public function addPasien()
    {
        $nik = $this->request->getPost('nik');

        if (strlen($nik) !== 16) {
            session()->setFlashdata('error', 'Gagal menambahkan data pasien. NIK harus terdiri dari 16 karakter.');
            return redirect()->back()->withInput();
        }

        $pasienModel = new PasienModel();

        $existingPasien = $pasienModel->where('nik', $nik)->first();
        if ($existingPasien) {
            session()->setFlashdata('error', 'Gagal menambahkan data pasien. NIK sudah terdaftar.');
            return redirect()->back()->withInput();
        }

        $data = [
            'nomor_rekam_medis'  => $this->request->getPost('nomor_rekam_medis'),
            'nik'                => $nik,
            'identitas_lain'     => $this->request->getPost('identitas_lain'),
            'nama_lengkap'       => ucwords($this->request->getPost('nama_lengkap')),
            'nama_ibu_kandung'   => $this->request->getPost('nama_ibu_kandung'),
            'jenis_kelamin_id'   => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'       => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'      => ucwords($this->request->getPost('tanggal_lahir')),
            'suku'               => ucwords($this->request->getPost('suku')),
            'bahasa'             => ucwords($this->request->getPost('bahasa')),
            'alamat_lengkap'     => ucwords($this->request->getPost('alamat_lengkap')),
            'alamat_domisili'    => ucwords($this->request->getPost('alamat_domisili')),
            'rt'                 => $this->request->getPost('rt'),
            'rw'                 => $this->request->getPost('rw'),
            'kelurahan'          => $this->request->getPost('kelurahan'),
            'kecamatan'          => $this->request->getPost('kecamatan'),
            'kota'               => ucwords($this->request->getPost('kota')),
            'kode_pos'           => $this->request->getPost('kode_pos'),
            'provinsi'           => ucwords($this->request->getPost('provinsi')),
            'negara'             => ucwords($this->request->getPost('negara')),
            'telepon_rumah'      => $this->request->getPost('telepon_rumah'),
            'telepon_selular'    => $this->request->getPost('telepon_selular'),
            'pekerjaan'          => ucwords($this->request->getPost('pekerjaan')),
            'status_pernikahan'  => $this->request->getPost('status_pernikahan'),
            'agama_id'           => $this->request->getPost('agama'),
            'pendidikan_id'      => $this->request->getPost('pendidikan')
        ];

        $pasienModel->insert($data);

        return redirect()->to(base_url('pasien'))->with('success', 'Data pasien berhasil ditambahkan!');
    }

    public function delete($id)
    {
        $pasien = $this->pasienModel->find($id);

        if (!$pasien) {
            return redirect()->to(base_url('/pasien'))->with('error', 'Data pasien tidak ditemukan.');
        }

        $this->rekamMedisModel->where('pasien_id', $id)->delete();

        $this->resepModel->where('pasien_id', $id)->delete();

        $this->resumePasienModel->where('pasien_id', $id)->delete();

        $this->pembayaranModel->where('pasien_id', $id)->delete();

        $this->pasienModel->delete($id);

        if ($this->userModel->delete($id)) {
            return redirect()->to(base_url('/pasien'))->with('success', 'Data pasien dan semua relasinya berhasil dihapus.');
        } else {
            return redirect()->to(base_url('/master-user'))->with('error', 'Gagal menghapus data user');
        }
    }
}
