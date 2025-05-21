<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('components.auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
}) -> name('dashboard');


Route::get('/dashboard/absensi', function () {
    return view('pages.absensi');
}) -> name('absensi');


Route::get('/dashboard/pengajuan-cuti', function () {
    return view('pages.pengajuan-cuti');
}) -> name('pengajuan-cuti');


Route::get('/dashboard/pengajuan-izin', function () {
    return view('pages.pengajuan-izin');
}) -> name('pengajuan-izin');

Route::get('/dashboard/setting', function () {
    return view('pages.setting');
}) -> name('setting');