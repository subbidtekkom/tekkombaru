<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Notifications\DataBerhasilDieksekusi;

class SuratKeluar extends Model
{
    use HasFactory;

    // $->notify(new DataBerhasilDieksekusi());

    protected $guarded = [];
    // protected $table = 'surat_keluars';

    protected $fillable = [
        'no_agenda',
        'no_surat',
        'jenis_surat',
        'asal_surat',
        'perihal',
        'kka',
        'dasar_surat',
        'tgl_surat',
        'jam_surat',
        'disposisi',
        'distribusi',
        'isi_disposisi',
        'feedback',
        'file'
    ];

}