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
    <div class="d-flex justify-content-between flex-wrap flex-end-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Surat</h1>
    </div>

    <div class="d-grid gap-2 d-md-block  mb-3">
        <a href="{{ route('surat.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg pe-2"></i>Tambah</a>
        <a href="{{ route('surat.export-excel') }}" class="btn btn-info text-white"><i
                class="bi bi-box-arrow-up-right pe-2"></i>Export Klasifikasi Surat</a>
    </div>

    <table class="table table-striped table-bordered table-whover mt-3" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Perihal</th>
                <th>Tanggal Keluar</th>
                <th>Penerima Surat</th>
                <th>Notulis</th>
                <th>Hasil Rapat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($surat as $datas)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $datas->lettertype->letter_code }}/000{{ $datas->id }}/SMK Wikrama/XII/{{ date('Y') }}
                    </td>
                    <td>{{ $datas['letter_perihal'] }}</td>
                    <td>{{ Carbon\Carbon::parse($datas->created_at)->formatLocalized('%d %B %Y') }}</td>
                    <td>{{ $datas->recipients }}</td>
                    <td>{{ $datas->user->name }}</td>
                    <td>-</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('surat.edit', $datas['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('surat.destroy', $datas['id']) }}" class="d-inline" method="post"
                            onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
