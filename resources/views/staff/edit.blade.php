@extends('layouts.template')

@section('content')
<div class="d-block justify-content-between flex-wrap flex-end-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Staff</h1>
    <div class="d-flex">
        <h6>Home / Data Staff /<b class="text-primary"> Edit Data Staff</b></h6>
    </div>
</div>
    <form action="{{ route('staff.update', $user['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna :</label>
            <div class="col-sm-10">
                <select class="form-select" id="role" name="role">
                    <option value="staff" {{ $user['role'] == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="guru" {{ $user['role'] == 'guru' ? 'selected' : '' }}>Guru</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Ubah Password :</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
@endsection
