@extends('layouts.template')

@section('content')
    <div class="d-block justify-content-between flex-wrap flex-end-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Staff</h1>
        <div class="d-flex">
            <h6>Home / Data Staff /<b class="text-primary"> Tambah Data Staff</b></h6>
        </div>
    </div>
    <form action="{{ route('staff.store') }}" method="POST" class="card p-5">
        {{-- mengecek value dari hasil input user --}}
        @csrf
        <div class="container">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-sm-2 col-form-label" hidden>Tipe pengguna :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('role') is-invalid @enderror" id="role"
                        name="role" value="staff" hidden>
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
    </form>
@endsection
