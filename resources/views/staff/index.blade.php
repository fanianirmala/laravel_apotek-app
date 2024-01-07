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
        <h1 class="h2">Data Staff</h1>
        <div class="d-flex">
            <h6>Home /<b class="text-primary"> Data Staff</b></h6>
        </div>
    </div>
    <div class="card-tools">
        <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-lg pe-2"></i>Tambah Data
            Staff</a>
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
            @foreach ($staff as $staffs)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $staffs['name'] }}</td>
                    <td>{{ $staffs['email'] }}</td>
                    <td>{{ $staffs['role'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('staff.edit', $staffs['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('staff.destroy', $staffs['id']) }}" class="d-inline" method="post"
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
