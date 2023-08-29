<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surat_masuks')->delete();

        DB::table('surat_masuks')->insert([
            'id' => '1',
            'nomor_agenda' => 'B/ /VIII/HUM.9.1/2023',
            'nomor_surat' => 'B/297/VIII/HUM.9.1/2023',
            'jenis_surat' => 'Surat Biasa',
            'asal_surat' => 'Kabid Humas',
            'perihal' => 'Majalah Tribrata News',
            'kka' => 'HUM',
            'tanggal_surat' => '2023-08-10',
            'jam_terima' => '10.00 WIB',
            'disposisi_kepada' => 'Ksbd.Renmin;',
            'distribusi' => 'Kapolda DIY',
            'isi_disposisi' => 'Dibaca',
            'keterangan' => 'Baca',
            'file' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}