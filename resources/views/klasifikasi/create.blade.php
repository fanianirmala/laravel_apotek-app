@extends('layouts.template')

@section('content')
    <div class="d-block justify-content-between flex-wrap flex-end-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Tambah Data Klasifikasi Surat</h1>
        <div class="d-flex">
            <h6>Home / Data Klasifikasi Surat /<b class="text-primary"> Tambah Data Klasifikasi Surat</b></h6>
        </div>
    </div>
    <form action="{{ route('klasifikasi.store') }}" method="POST" class="card p-5">
        {{-- mengecek value dari hasil input user --}}
        @csrf
        <div class="container">
            <div class="mb-3 row">
                <label for="letter_code" class="col-sm-2 col-form-label">Kode Surat :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('letter_code') is-invalid @enderror" id="letter_code"
                        name="letter_code">
                    @error('letter_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name_type" class="col-sm-2 col-form-label">Klasifikasi Surat :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name_type') is-invalid @enderror" id="name_type"
                        name="name_type">
                    @error('name_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>
@endsection
