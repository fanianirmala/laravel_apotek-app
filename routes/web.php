<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\LetterController;

use Illuminate\Support\Facades\Route;

Route::middleware('IsGuest')->group(function(){
    Route::get('/', function(){
        return view('login');
    })->name('login');
    Route::post('/', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');

Route::middleware(['IsLogin', 'IsStaff'])->group(function(){

    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/guru')->name('guru.')->group(function(){
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::get('/create', [GuruController::class, 'create'])->name('create');
        Route::post('/store', [GuruController::class, 'store'])->name('store');
        Route::get('/{id}', [GuruController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [GuruController::class, 'update'])->name('update');
        Route::delete('/{id}', [GuruController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/staff')->name('staff.')->group(function(){
        Route::get('/', [StaffController::class, 'index'])->name('index');
        Route::get('/create', [StaffController::class, 'create'])->name('create');
        Route::post('/store', [StaffController::class, 'store'])->name('store');
        Route::get('/{id}', [StaffController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StaffController::class, 'update'])->name('update');
        Route::delete('/{id}', [StaffController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/klasifikasi')->name('klasifikasi.')->group(function(){
        Route::get('/', [LetterTypeController::class, 'index'])->name('index');
        Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
        Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
        Route::get('/show/{id}', [LetterTypeController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [LetterTypeController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LetterTypeController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [LetterTypeController::class, 'destroy'])->name('destroy');
        Route::get('/export-excel', [LetterTypeController::class, 'exportExcel'])->name('export-excel');
        Route::get('/download/{id}', [LetterTypeController::class, 'downloadPDF'])->name('download');
    });

    Route::prefix('/surat')->name('surat.')->group(function(){
        Route::get('/', [LetterController::class, 'index'])->name('index');
        Route::get('/create', [LetterController::class, 'create'])->name('create');
        Route::post('/store', [LetterController::class, 'store'])->name('store');
        Route::get('/{id}', [LetterController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LetterController::class, 'update'])->name('update');
        Route::delete('/{id}', [LetterController::class, 'destroy'])->name('destroy');
        Route::get('/export-excel', [LetterController::class, 'exportExcel'])->name('export-excel');

    });
});

Route::middleware(['IsLogin', 'IsGuru'])->group(function(){

});

Route::middleware(['IsLogin'])->group(function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', function(){
        return view('home');
    })->name('home.page');
});


