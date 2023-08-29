<?php

namespace App\Http\Controllers;

//use Charts;
// use ConsoleTVs\Charts\Facades\Charts;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
//use ConsoleTVs\Charts\Facades\Charts;
// use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GrafikController extends Controller
{
    //

    // public function grafikSurat()
    // {
    //     $suratMasukData = SuratMasuk::selectRaw('DATE_FORMAT(tanggal_surat, "%Y-%m") as bulan, COUNT(*) as total_surat_masuk')
    //         ->groupBy('bulan')
    //         ->orderBy('bulan')
    //         ->get();

    //     $suratKeluarData = SuratKeluar::selectRaw('DATE_FORMAT(tgl_surat, "%Y-%m") as bulan, COUNT(*) as total_surat_keluar')
    //         ->groupBy('bulan')
    //         ->orderBy('bulan')
    //         ->get();

    //     $bulan = $suratMasukData->pluck('bulan'); // Extract the months for X-axis labels

    //     return view('home', compact('suratMasukData', 'suratKeluarData', 'bulan'));
    // }

    //     $chart = Charts::database($suratMasukData, 'bar', 'highcharts')
    //         ->title('Grafik Total Surat Masuk dan Surat Keluar per Bulan')
    //         ->elementLabel('Total Surat')
    //         ->dimensions(800, 400)
    //         ->groupBy('bulan')
    //         ->dataset('Surat Masuk', 'total_surat_masuk')
    //         ->dataset('Surat Keluar', 'total_surat_keluar');

    //     return view('home', compact('chart'));
    // }

    // public function grafik(){
    //     $total_surat1 = SuratMasuk::select(DB::raw("CAST(SUM(total_surat1) as int) as total_surat1"))
    //         ->GroupBy(DB::raw("Month(created_at)"))
    //         ->pluck('total_surat1');

    //     $bulan = SuratMasuk::select(DB::raw("MONTHNAME(created_at) as bulan"))
    //         ->GroupBy(DB::raw("MONTHNAME(created_at)"))
    //         ->pluck('bulan');

    //     $total_surat2 = SuratKeluar::select(DB::raw("CAST(SUM(total_surat2) as int) as total_surat2"))
    //         ->GroupBy(DB::raw("Month(created_at)"))
    //         ->pluck('total_surat2');

    //         return view('home', compact('total_surat1', 'total_surat2', 'bulan'));


    // }
    public function grafikSurat()
    {
        // $totalMasuk = SuratMasuk::count(); // Ganti dengan nama model yang sesuai
        // $totalKeluar = SuratKeluar::count();

        // $chart = new Chart('bar', 'chartjs');
        // $chart->title('Total Surat');
        // $chart->labels(['Total Surat']);
        // //$chart->dataset('Count', 'bar', [$totalCount]);
        // $chart->dataset('SuratMasuk', 'bar', [$totalMasuk])->color('blue');
        // $chart->dataset('SuratKeluar', 'bar', [$totalKeluar])->color('red');


        // return view('home', [
        //     "title" => "Daftar Surat Masuk"
        // ], ['chart' => $chart]);

        $dailyDataMasuk = SuratMasuk::select(
            DB::raw('DATE_FORMAT(tanggal_surat, "%Y-%m") as month'),
            DB::raw('COUNT(*) as total_surat')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $dailyDataKeluar = SuratKeluar::select(
            DB::raw('DATE_FORMAT(tgl_surat, "%Y-%m") as month'),
            DB::raw('COUNT(*) as total_surat')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];

        foreach ($dailyDataMasuk as $data) {
            $months[] = $data->month;
        }

        // $chart = new Chart('bar', 'chartjs');
        // $chart->title('Monthly Surat');
        // $chart->labels($months);

        // $chart->dataset('Surat Masuk', 'bar', $dailyDataMasuk->pluck('total_surat'))->color('blue');
        // $chart->dataset('Surat Keluar', 'bar', $dailyDataKeluar->pluck('total_surat'))->color('red');

        // dd($months, $dailyDataMasuk->pluck('total_surat'), $dailyDataKeluar->pluck('total_surat'));

        $data = [
            'labels' => $months,
            'surat_masuk' => $dailyDataMasuk->pluck('total_surat'),
            'surat_keluar' => $dailyDataKeluar->pluck('total_surat')
        ];

        return view('home', [
            'title' => 'Home',
            'data' => $data,
        ]);
    }


}