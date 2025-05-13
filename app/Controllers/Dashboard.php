<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FormTindakanModel;
use App\Models\PasienModel;
use App\Models\RMModel;
use App\Models\PembayaranModel;

class Dashboard extends BaseController
{

    protected $PasienModel;
    protected $formulirTindakanModel;
    protected $rekamMedisModel;
    protected $pembayaranModel;

    public function __construct()
    {
        $this->PasienModel = new PasienModel();
        $this->formulirTindakanModel = new FormTindakanModel();
        $this->rekamMedisModel = new RMModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function index()
    {
        // total banyak data pasien
        $totalPasien = $this->PasienModel->countAll();
        $pasienTerbaru = $this->PasienModel
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->find();

        // Hitung pasien baru minggu ini
        $jumlahPasienTerbaru = $this->PasienModel
            ->where('created_at >=', date('Y-m-d', strtotime('-7 days')))
            ->countAllResults();

        // Hitung pasien minggu lalu
        $jumlahPasienMingguLalu = $this->PasienModel
            ->where('created_at >=', date('Y-m-d', strtotime('-14 days')))
            ->where('created_at <', date('Y-m-d', strtotime('-7 days')))
            ->countAllResults();

        $persentaseKenaikan = 0;
        if ($jumlahPasienMingguLalu > 0) {
            $persentaseKenaikan = round((($jumlahPasienTerbaru - $jumlahPasienMingguLalu) / $jumlahPasienMingguLalu) * 100);
        }

        // total tindakan
        $totalTindakan = $this->formulirTindakanModel->countAll();

        // Ambil data jumlah pasien per bulan
        $pasienPerBulan = $this->PasienModel
            ->select("MONTH(tanggal_lahir) AS bulan, COUNT(id_pasien) AS jumlah_pasien")
            ->groupBy("MONTH(tanggal_lahir)")
            ->orderBy("bulan", "ASC")
            ->findAll();

        // Menyiapkan data untuk grafik
        $bulan = [];
        $jumlahPasien = [];

        foreach ($pasienPerBulan as $data) {
            $bulan[] = date('F', mktime(0, 0, 0, $data['bulan'], 10)); // Nama bulan
            $jumlahPasien[] = $data['jumlah_pasien']; // Jumlah pasien per bulan
        }

        // Ambil data riwayat transaksi pembayaran
        $riwayatTransaksi = $this->pembayaranModel
            ->select('pembayaran.id_bayar, pembayaran.no_bayar, pembayaran.tanggal_bayar, pembayaran.total_bayar, pembayaran.cara_pembayaran, pasien.nama_lengkap')
            ->join('pasien', 'pasien.id_pasien = pembayaran.pasien_id')
            ->orderBy('pembayaran.tanggal_bayar', 'DESC')
            ->findAll(5);
        

        $data = [
            'tittle' => 'Dashboard',
            'totalPasien' => $totalPasien,
            'totalTindakan' => $totalTindakan,
            'pasienTerbaru' => $pasienTerbaru,
            'jumlahPasienTerbaru' => $jumlahPasienTerbaru,
            'persentaseKenaikan' => $persentaseKenaikan,
            'bulan' => $bulan,
            'jumlahPasien' => $jumlahPasien,
            'riwayatTransaksi' => $riwayatTransaksi,
            'totalPemasukan' => $totalPemasukan['total_bayar'] ?? 0,            
        ];
        return view('admin/dashboard', $data);
    }
    public function sidebar()
    {
        return view('/layout/template');
    }
}
