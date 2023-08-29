<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $table = 'surat_masuks';
    protected $table = 'surat_masuks';

    // public function scopeFilter($query, array $filters){
    //     $query->when($filters['search'] ?? false, function($query, $search){
    //         return $query->where('nomor_surat', 'LIKE', '%' .$search.'%')->paginate(5)
    //                     ->orWhere('kka', 'LIKE', '%' .$search.'%')->paginate(5);
    //     });
    // }

    protected $fillable = [
        'nomor_agenda',
        'nomor_surat',
        'jenis_surat',
        'asal_surat',
        'perihal',
        'kka',
        'tanggal_surat',
        'jam_terima',
        'disposisi_kepada',
        'distribusi',
        'isi_disposisi',
        'keterangan',
        'file'
    ];

    // public static function deleteDocument($id){
    //     $file = SuratMasuk::findorFail($id);

    //     dokumennsuratmasuk::delete($file->file_path);

    //     $file->delete();
    // }

}