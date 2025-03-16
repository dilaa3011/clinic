<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AntrianModel;
use App\Models\RMModel;
use App\Models\PasienModel;
use App\Models\DokterModel;

class DokterController extends BaseController
{
    protected $antrianModel;
    protected $pasienModel;
    protected $rekamMedisModel;
    protected $dokterModel;

    public function __construct()
    {
        $this->rekamMedisModel = new RMModel();
        $this->antrianModel = new AntrianModel();
        $this->pasienModel = new PasienModel();
        $this->dokterModel = new DokterModel();
    }

    public function index()
    {

        $rekamMedis = $this->rekamMedisModel
            ->select('rekam_medis.*, pasien.nama AS nama_pasien, pasien.tanggal_lahir, tb_dokter.nama AS nama_dokter, antrian.id AS antrian_id')
            ->join('pasien', 'rekam_medis.pasien_id = pasien.id', 'left')
            ->join('tb_dokter', 'rekam_medis.dokter_id = tb_dokter.id', 'left')
            ->join('antrian', 'rekam_medis.id = antrian.rm_id', 'left')            
            ->findAll();

        // dd($rekamMedis);

        return view('dokter/data-rm', [
            'tittle' => 'Rekam Medis',
            'rekamMedis' => $rekamMedis,
        ]);
    }

    public function updateRekamMedis()
    {
        $validationRules = [
            'keluhan'  => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'resep'    => 'required',
            'catatan'  => 'required',
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $rekamId = $this->request->getPost('rekam_id');
        $data = $this->request->getPost(['keluhan', 'diagnosa', 'tindakan', 'resep', 'catatan']);

        if ($this->rekamMedisModel->update($rekamId, $data)) {
            return redirect()->to(base_url('/rm'))->with('success', 'Data berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Gagal memperbarui data');
    }
}
