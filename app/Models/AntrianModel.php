<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianModel extends Model
{
    protected $table      = 'antrian';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nik',
        'tanggal_periksa',
        'nomor_antrian',
        'nama',
        'status_pemeriksaan',
        'tarif',
        'status_bayar',
        'tanggal_lahir',
        'tindakan',
        'dokter_id'
    ];

    protected $useTimestamps = true;

    // public function getAntrianHariIni()
    // {
    //     //  data antrian tanggal hari ini
    //     return $this->db->table('antrian')
    //         ->where('DATE(tanggal_periksa)', date('Y-m-d'))
    //         ->orderBy('tanggal_periksa', 'asc')
    //         ->get()
    //         ->getResultArray();
    // }

    public function getDataByAntrian($antrian)
    {
        return $this->where('nik', $antrian)->first();
    }

    public function tambahAntrian($data)
    {

        $tanggal = date('Y-m-d');

        //  nomor antrian terakhir tanggal hari ini
        $lastAntrian = $this->where('tanggal_periksa', $tanggal)
            ->orderBy('nomor_antrian', 'DESC')
            ->first();

        $nomor_antrian = $lastAntrian ? $lastAntrian['nomor_antrian'] + 1 : 1;

        // tambah data
        $data['tanggal_periksa'] = $tanggal;
        $data['nomor_antrian'] = $nomor_antrian;
        $this->insert($data);

        // Ambil data antrian yang baru 
        $newAntrian = $this->where('id', $this->getInsertID())->first();

        return $newAntrian;
    }
}
