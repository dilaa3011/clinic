<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RMSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'pasien_id'      => 1,
                'dokter_id'      => 1,
                'no_rm'          => 1,
                'keluhan'        => 'Gigi terasa nyeri saat mengunyah makanan.',
                'diagnosa'       => 'Karies gigi tingkat lanjut pada gigi geraham kiri.',
                'tindakan'       => 'Pembersihan area karies dan penambalan gigi.',
                'resep'     => 'Paracetamol 500mg, Amoxicillin 500mg.',
                'catatan'        => 'Pasien diminta untuk kontrol kembali dalam 1 minggu.',
                'tanggal_periksa' => '2025-01-13 10:00:00',
                'created_at'     => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
                'updated_at'     => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            ],
            [
                'pasien_id'      => 2,
                'dokter_id'      => 1,
                'no_rm'          => 2,
                'keluhan'        => 'Gusi sering berdarah terutama saat menyikat gigi.',
                'diagnosa'       => 'Gingivitis (radang gusi).',
                'tindakan'       => 'Pembersihan karang gigi (scaling) dan edukasi kebersihan mulut.',
                'resep'     => 'Chlorhexidine mouthwash 0.2%.',
                'catatan'        => 'Pasien diminta untuk kontrol kembali dalam 1 minggu.',
                'tanggal_periksa' => '2025-01-12 09:30:00',
                'created_at'     => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
                'updated_at'     => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            ],
        ];

        // Insert data ke tabel rekam medis
        $this->db->table('rekam_medis')->insertBatch($data);
    }
}
