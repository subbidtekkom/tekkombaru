<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

// use Alert;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $data = SuratMasuk::query();

        // if ($request->has('nomor_surat')){
        //     $query->where('nomor_surat', 'LIKE', '%' . $request->nomor_surat . '%')->paginate(5);
        // }
        // if ($request->has('tanggal_surat')){
        //     $query->whereDate('tanggal_surat', 'LIKE', '%' . $request->tanggal_surat . '%')->paginate(5);
        // }
        // if($request->has('search')){
        //         $data = SuratMasuk::where('nomor_surat', 'LIKE', '%' .$request->search.'%')->paginate(5);
        //                             // ->orWhere('kka', 'LIKE', '%' .$request->search.'%')->paginate(5);
        // }
        // else{
        $data = SuratMasuk::paginate(5);
        // }
        return view(
            'suratmasuk',
            compact('data'),
            [
                "title" => "Daftar Surat Masuk"
            ]
        );
    }

    // public function cetakSuratMasuk(){
    //     $data=SuratMasuk::with('suratMasuk')->get();
    //     return view('cetakSuratMasuk', compact('data'));
    // }

    public function cari(Request $request)
    {
        $searchTerm = $request->search;
        $data = [];

        // if ($searchTerm) {
        //     $data = DB::select("SELECT * FROM surat_masuks WHERE nomor_surat = ? OR tanggal_surat = ? OR kka = ?", [$searchTerm, $searchTerm, $searchTerm]);
        // }

        if ($searchTerm) {
            $data = DB::table('surat_masuks')
                ->where('nomor_surat', $searchTerm)
                ->orWhere('tanggal_surat', $searchTerm)
                ->orWhere('kka', $searchTerm)
                ->paginate(5);
        } else {
            $data = DB::table('surat_masuks')->paginate(5);
        }

        $pesan = $data->isEmpty() ? "File tidak ditemukan" : "";

        return view(
            'suratmasuk',
            compact('data', 'pesan', 'searchTerm'),
            [
                "title" => "Daftar Surat Masuk"
            ]
        );
    }

    public function tambahdata()
    {
        return view('masuk', [
            "title" => "Input Surat Masuk"
        ]);
    }

    public function insertsurat(Request $request)
    {
        // dd($request->all());

        // $request->validate([
        //     'nomor_agenda' => 'required',
        //     'nomor_surat' => 'required',
        //     'jenis_surat' => 'required',
        //     'asal_surat' => 'required',
        //     'perihal' => 'required',
        //     'kka' => 'required',
        //     'tanggal_surat' => 'required',
        //     'jam_terima' => 'required',
        //     'disposisi_kepada' => 'required',
        //     'distribusi' => 'required',
        //     'isi_disposisi' => 'required',
        //     'keterangan' => 'required',
        //     'file' => 'required|mimes:pdf,word,jpeg,png,jpg',
        // ]);

        $disposisi_kepada = "";
        for ($i = 0; $i < sizeof($request->get('disposisi')); $i++) {
            if ($request->get('disposisi')[$i] != null) {
                $disposisi_kepada .= $request->get('disposisi')[$i] . ";";
            }
        }

        $data = SuratMasuk::create(
            [
                'nomor_agenda' => $request->nomor_agenda,
                'nomor_surat' => $request->nomor_surat,
                'jenis_surat' => $request->jenis_surat,
                'asal_surat' => $request->asal_surat,
                'perihal' => $request->perihal,
                'kka' => $request->kka,
                'tanggal_surat' => $request->tanggal_surat,
                'jam_terima' => $request->jam_terima,
                'disposisi_kepada' => $disposisi_kepada,
                'distribusi' => $request->distribusi,
                'isi_disposisi' => $request->isi_disposisi,
                'keterangan' => $request->keterangan,
            ]
        );

        // $data = SuratMasuk::create($request->all());
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('dokumensuratmasuk/', $filename);
            $data->file = $filename;
            $data->save();

        }

        // return redirect()->route('daftar-surat-masuk')->with('success', 'Data Berhasil di Tambahkan');
        Alert::success('Data Berhasil Disimpan', 'Data surat masuk telah berhasil disimpan ke database.')->toHtml();
        return redirect('/daftar-surat-masuk');


    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('dokumensuratmasuk/' . $file));
    }

    public function tampilkandatamasuk($id)
    {
        $data = SuratMasuk::find($id);
        return view('tampildatamasuk', compact('data'));
    }

    public function updatedatamasuk(Request $request, $id)
    {
        $data = SuratMasuk::find($id);
        // if ($request->hasFile('file')) {
        //     $request->file('file')->move('dokumensuratmasuk/', $request->file('file')->getClientOriginalName());
        //     $data->file = $request->file('file')->getClientOriginalName();
        //     $data->save();
        $disposisi_kepada = "";
        for ($i = 0; $i < sizeof($request->get('disposisi')); $i++) {
            if ($request->get('disposisi')[$i] != null) {
                $disposisi_kepada .= $request->get('disposisi')[$i] . ";";
            }
        }

        $data->update(
            [
                'nomor_agenda' => $request->nomor_agenda,
                'nomor_surat' => $request->nomor_surat,
                'jenis_surat' => $request->jenis_surat,
                'asal_surat' => $request->asal_surat,
                'perihal' => $request->perihal,
                'kka' => $request->kka,
                'tanggal_surat' => $request->tanggal_surat,
                'jam_terima' => $request->jam_terima,
                'disposisi_kepada' => $disposisi_kepada,
                'distribusi' => $request->distribusi,
                'isi_disposisi' => $request->isi_disposisi,
                'keterangan' => $request->keterangan,
            ]
        );

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('dokumensuratmasuk/', $filename);
            $data->file = $filename;
            $data->save();
        }

        // $data->update($request->all());
        // return redirect()->route('daftar-surat-masuk')->with('success', 'Data Berhasil di Update');
        Alert::success('Data Berhasil DiUpdate', 'Data surat masuk telah berhasil diupdate ke database.')->toHtml();
        return redirect('/daftar-surat-masuk');
    }

    public function deletemasuk($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        if (!$suratMasuk) {
            Alert::error('Data tidak ditemukan', 'Data dengan ID yang diberikan tidak ditemukan.');
        } else {
            $file = SuratMasuk::find($id)->file;
            if (file_exists(public_path('dokumensuratmasuk/' . $file))) {
                unlink(public_path('dokumensuratmasuk/' . $file));
            }

            $suratMasuk->delete();
            Alert::success('Data Berhasil Dihapus', 'Data surat masuk telah berhasil dihapus dari database.')->toHtml();
        }
        return redirect()->back()->with('success', 'Data surat masuk berhasil dihapus.');

    }

    public function showForm()
    {
        return view('pilih-bulan-masuk');
    }

    public function exportpdfmasuk(Request $request)
    {
        $bulan = $request->input('bulan');
        $data = SuratMasuk::whereMonth('tanggal_surat', $bulan)->get();

        $pdf = PDF::loadView('cetaksuratmasuk', ['data' => $data, 'bulan' => $bulan]);

        return $pdf->download('suratmasuk' . $bulan . '.pdf');
    }

    // public function exportpdfmasuk(){
    //     $data = SuratMasuk::all();

    //     view()->share('data', $data);
    //     $pdf = PDF::loadview('cetaksuratmasuk');
    //     return $pdf->download('suratmasuk.pdf');

    // }

}