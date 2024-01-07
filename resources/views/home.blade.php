@extends('layouts.template')

@section('content')
    <div class="jumbotron py-4 px-5">
        @if (Session::get('cannotAccess'))
            <div class="alert alert-danger">{{ Session::get('cannotAccess') }}</div>
        @endif
        <h1 class="display-4">
            Selamat Datang!
            @auth
                {{ Auth::user()->name }} !
            @endauth
        </h1>
        <hr class="my-4">
        <p>Aplikasi ini digunakan hanya oleh Staff Tata Usaha dan Guru untuk pengelolaan Surat.</p>
        @if (Auth::check())
            @if (Auth::user()->role == 'staff')
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-light text-primary mb-4">
                            <div class="card-body">
                                Surat Keluar
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <h2><i class="bi bi-envelope pe-3"></i>{{ App\Models\Letter::all()->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-light text-primary mb-4">
                            <div class="card-body">
                                Klasifikasi Surat
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <h2><i class="bi bi-envelope-paper pe-3"></i>{{ App\Models\LetterType::all()->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-light text-primary mb-4">
                            <div class="card-body">
                                Staff Tata Usaha
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <h2><i class="bi bi-people pe-3"></i>{{ App\Models\User::where('role', 'staff')->count() }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-light text-primary mb-4">
                            <div class="card-body">
                                Guru
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <h2><i class="bi bi-people pe-3"></i>{{ App\Models\User::where('role', 'guru')->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light text-primary mb-4">
                    <div class="card-body">
                        Data Surat Masuk
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h2><i class="bi bi-envelope pe-3"></i>{{ App\Models\Letter::all()->count() }}</h2>
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
@endsection
