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
        <h1 class="h2">Data Guru</h1>
        <div class="d-flex">
            <h6>Home /<b class="text-primary"> Data Guru</b></h6>
        </div>
    </div>
    <div class="card-tools">
        <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-lg pe-2"></i>Tambah Data
            Guru</a>
    </div>
    <table class="table table-striped table-bordered table-hover mt-3" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($guru as $gurus)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $gurus['name'] }}</td>
                    <td>{{ $gurus['email'] }}</td>
                    <td>{{ $gurus['role'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('guru.edit', $gurus['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('guru.destroy', $gurus['id']) }}" class="d-inline" method="post"
                            onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?')">
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
