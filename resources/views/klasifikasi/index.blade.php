@extends('layouts.template')

@section('content')
@if (Session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ Session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-block justify-content-between flex-wrap flex-end-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Klasifikasi Surat</h1>
    <div class="d-flex">
        <h6>Home /<b class="text-primary"> Data Klasifikasi Surat</b></h6>
    </div>
</div>
<div class="d-grid gap-2 d-md-block  mb-3">
    <a href="{{ route('klasifikasi.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg pe-2"></i>Tambah</a>
    <a href="{{ route('klasifikasi.export-excel') }}" class="btn btn-info text-white"><i class="bi bi-box-arrow-up-right pe-2"></i>Export Klasifikasi Surat</a>
</div>
<table class="table table-striped table-bordered table-whover mt-3" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Surat</th>
            <th>Klasifikasi Surat</th>
            <th>Surat Tertaut</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($let as $letters)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $letters['letter_code'] }}</td>
                <td>{{ $letters['name_type'] }}</td>
                <td>{{ App\Models\Letter::where('letter_type_id', $letters->id)->count() }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('klasifikasi.show', $letters['id']) }}" class="btn btn-warning me-3 text-white">Show</a>
                    <a href="{{ route('klasifikasi.edit', $letters['id']) }}" class="btn btn-primary me-3">Edit</a>
                    <form action="{{ route('klasifikasi.destroy', $letters['id']) }}" class="d-inline" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?')">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger me-3">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
