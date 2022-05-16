<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Accidents;
use App\Http\Livewire\Profiles;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Beneficiaires;
use App\Http\Livewire\dossiers\DetailDossiers;
use App\Http\Livewire\dossiers\Dossiers;
use App\Http\Livewire\Prises;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Auth::routes(['verify' => true]);


Route::get('/dashboard/beneficiaires', Beneficiaires::class)->middleware('verified');

Route::get('/dashboard/dossiers', Dossiers::class)->name('dossier.index')->middleware('verified');
Route::get('/dashboard/details-dossiers/{id}', DetailDossiers::class)->name('dossier.detail')->middleware('verified');

Route::get('/dashboard/accidents-de-travail', Accidents::class)->middleware('verified');

Route::get('/dashboard/prise-en-charge', Prises::class)->middleware('verified');

Route::get('/dashboard', Profiles::class)->middleware('verified');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});