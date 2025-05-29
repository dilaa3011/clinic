<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PasienModel;
use App\Models\RMModel;
use App\Models\JeniskelaminModel;
use App\Models\AgamaModel;
use App\Models\PendidikanModel;


class DetailPasien extends BaseController
{
    protected $pasienModel;
    protected $rekamMedisModel;
    protected $jenisKelaminModel;
    protected $agamaModel;
    protected $pendidikanModel;
    protected $db;

    public function __construct()
    {
        $this->pasienModel = new PasienModel();
        $this->rekamMedisModel = new RMModel();
        $this->jenisKelaminModel = new JeniskelaminModel();
        $this->agamaModel = new AgamaModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // Ambil semua nomor rekam medis
        $allNomor = $this->pasienModel->select('nomor_rekam_medis')->findAll();

        $lasNum = 0;
        foreach ($allNomor as $item) {
            $nomor = $item['nomor_rekam_medis'];
            // ambil 4 digit terakhir
            $last4 = substr($nomor, -4);
            if (is_numeric($last4)) {
                $num = (int)$last4;
                if ($num > $lasNum) {
                    $lasNum = $num;
                }
            }
        }

        // nomor baru
        $newNumber = str_pad($lasNum + 1, 6, '0', STR_PAD_LEFT);

        // Format: 00-00-01 (tiap dua angka diberi tanda hubung)
        $formattedNumber = implode('-', str_split($newNumber, 2));

        $tanggal = date('Ymd');
        $prefix = 'RM - ' . $tanggal;
        $nomor_rekam_medis = $prefix . ' - ' . $formattedNumber;



        // Sisanya seperti biasa...
        $pasien = $this->pasienModel
            ->select('pasien.*, jenis_kelamin.nama_jenis_kelamin, agama.nama_agama, pendidikan.nama_pendidikan')
            ->join('jenis_kelamin', 'jenis_kelamin.id_jenis_kelamin = pasien.jenis_kelamin_id')
            ->join('agama', 'agama.id_agama = pasien.agama_id')
            ->join('pendidikan', 'pendidikan.id_pendidikan = pasien.pendidikan_id')
            ->findAll();

        $jenis_kelamin = $this->jenisKelaminModel->findAll();
        $agama = $this->agamaModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();

        $data = [
            'tittle' => 'Tambah Pasien',
            'pasien' => $pasien,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'nomor_rekam_medis' => $nomor_rekam_medis,
        ];

        return view('pasien/add-pasien', $data);
    }

    public function edit()
    {
        $id = $this->request->getGet('id_pasien');


        $pasien = $this->pasienModel
            ->select('pasien.*, jenis_kelamin.nama_jenis_kelamin, agama.nama_agama, pendidikan.nama_pendidikan')
            ->join('jenis_kelamin', 'jenis_kelamin.id_jenis_kelamin = pasien.jenis_kelamin_id')
            ->join('agama', 'agama.id_agama = pasien.agama_id')
            ->join('pendidikan', 'pendidikan.id_pendidikan = pasien.pendidikan_id')
            ->find($id);

        $data = [
            'tittle'         => 'Edit Data Pasien',
            'pasien'         => $pasien,
            'jenis_kelamin'  => $this->jenisKelaminModel->findAll(),
            'agama'          => $this->agamaModel->findAll(),
            'pendidikan'     => $this->pendidikanModel->findAll()
        ];

        return view('pasien/edit-pasien', $data);
    }

    public function update($id)
    {
        // Ambil data pasien lama dari database
        $pasienLama = $this->pasienModel->find($id);
        if (!$pasienLama) {
            return redirect()->to(base_url('/pasien'))->with('error', 'Data pasien tidak ditemukan.');
        }

        // Ambil data dari form
        $input = $this->request->getPost();

        // Susun array data baru (dari form)
        $dataBaru = [
            'nomor_rekam_medis'   => $input['nomor_rekam_medis'],
            'nik'                 => $input['nik'],
            'nama_lengkap'        => ucwords($input['nama_lengkap']),
            'tempat_lahir'        => $input['tempat_lahir'],
            'tanggal_lahir'       => $input['tanggal_lahir'],
            'nama_ibu_kandung'    => ucwords($input['nama_ibu_kandung']),
            'telepon_rumah'       => $input['telepon_rumah'],
            'telepon_selular'     => $input['telepon_selular'],
            'suku'                => $input['suku'],
            'bahasa'              => $input['bahasa'],
            'jenis_kelamin_id'    => $input['jenis_kelamin'],
            'agama_id'            => $input['agama'],
            'pendidikan_id'       => $input['pendidikan'],
            'rt'                  => $input['rt'],
            'rw'                  => $input['rw'],
            'kelurahan'           => ucwords($input['kelurahan']),
            'kecamatan'           => ucwords($input['kecamatan']),
            'kota'                => ucwords($input['kota']),
            'kode_pos'            => $input['kode_pos'],
            'provinsi'            => ucwords($input['provinsi']),
            'negara'              => ucwords($input['negara']),
            'alamat_lengkap'      => ucwords($input['alamat_lengkap']),
            'alamat_domisili'     => ucwords($input['alamat_domisili']),
            'pekerjaan'           => ucwords($input['pekerjaan']),
            'identitas_lain'      => $input['identitas_lain'],
            'status_pernikahan'   => $input['status_pernikahan'],
        ];

        // Bandingkan data baru dan lama, ambil hanya yang berubah
        $dataUpdate = [];
        foreach ($dataBaru as $key => $value) {
            if ($value != $pasienLama[$key]) {
                $dataUpdate[$key] = $value;
            }
        }

        if (!empty($dataUpdate)) {
            // Update hanya jika ada perubahan
            $this->pasienModel->update($id, $dataUpdate);
            return redirect()->to(base_url('/pasien'))->with('success', 'Data pasien berhasil diperbarui.');
        } else {
            return redirect()->to(base_url('/pasien'))->with('success', 'Tidak ada perubahan data.');
        }
    }
}
