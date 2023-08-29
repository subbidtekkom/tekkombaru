<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SuratKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('surat_keluars')->delete();

        DB::table('surat_keluars')->insert([
            'id' => '1',
            'no_agenda' => 'Sprin/ /VIII/KEP/2023',
            'no_surat' => 'Sprin/118/VIII/KEP/2023',
            'jenis_surat' => 'Surat Perintah',
            'asal_surat' => 'Kabid TIK',
            'perihal' => 'Surat Perintah Mengikuti Donor Darah HUT Polwan',
            'kka' => 'HUM',
            'dasar_surat' => 'Surat Karo SDM Polda DIY',
            'tgl_surat' => '2023-08-23',
            'jam_surat' => '10.00 WIB',
            'disposisi' => 'Ksbd. Tekkom;',
            'distribusi' => 'Kapolda DIY',
            'isi_disposisi' => 'Sudah Terlaksana',
            'feedback' => 'Oke',
            'file' => '',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}