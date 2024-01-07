@extends('layouts.template')

@section('content')
<div class="d-block justify-content-between flex-wrap flex-end-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Kalsifikasi Surat</h1>
    <div class="d-flex">
        <h6>Home / Data Klasifikasi Surat /<b class="text-primary"> Edit Data Klasifikasi Surat</b></h6>
    </div>
</div>
    <form action="{{ route('klasifikasi.update', $letters['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="letter_code" class="col-sm-2 col-form-label">Kode Surat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="letter_code" name="letter_code" value="{{ $letters['letter_code'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name_type" class="col-sm-2 col-form-label">Klasifikasi Surat :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_type" name="name_type" value="{{ $letters['name_type'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@endsection

