@extends('layouts.main')

@section('container')
    <div class="content" style="width:style; display:flex; padding-top:10rem; justify-content-center; margin-left:3rem;">
        <div class="daftar" style="margin:auto; justify-content:center; position: relative;">
            <h1 style="font-size:35px; font-family: Times New Roman, Times, serif;">Silakan Pilih Keperluan Anda</h1>

            <button type="button" class="btn btn-primary"
                style=" width:181px; height:50px; border-radius:20px; --bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem; border:none; outline:none; padding:8px; cursor:pointer; background:#216588;margin-top:20px;">
                <a style="color:white; justify-content:center; text-decoration:none; font-family: Times New Roman, Times, serif; " href="/daftar-surat-masuk">Daftar Surat
                    Masuk</a>
            </button>
            
                <button type="button" class="btn btn-primary"
                    style=" width:181px; height:50px; border-radius:20px; --bs-btn-padding-y: .50rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .90rem; border:none; outline:none; padding:8px; cursor:pointer; background:#216588; margin-top:20px;">
                    <a style="color:white; justify-content:center; text-decoration:none; font-family: Times New Roman, Times, serif;"
                        href="/daftar-surat-keluar">Daftar Surat Keluar</a>
                </button>
           
        </div>
        <div class="right" style="justify-content:center; position: relative;">
            <img src="image/polri.png" alt="polri" style="width:500px; height:400px; margin-right:300px">
            <h3 style="margin-left:13rem; font-size:12px; font-family:cursive">Web by PETRACIA</h3>
        </div>
    </div>
@endsection
