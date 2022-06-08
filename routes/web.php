<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Accidents;
use App\Http\Livewire\Profiles;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Beneficiaires;
use App\Http\Livewire\dossiers\DetailDossiers;
use App\Http\Livewire\dossiers\Dossiers;
use App\Http\Livewire\Prises;
use App\Http\Livewire\Users;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

// Route Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Auth::routes(['verify' => true]);

// Route Espace Adhérent
Route::get('dashboard/beneficiaires', Beneficiaires::class)->middleware('auth');
Route::get('dashboard/dossiers', Dossiers::class)->name('dossier.index')->middleware('auth');
Route::get('dashboard/details-dossiers/{id}', DetailDossiers::class)->name('dossier.detail')->middleware('auth');
Route::get('dashboard/accidents-de-travail', Accidents::class)->middleware('auth');
Route::get('dashboard/prise-en-charge', Prises::class)->middleware('auth');
Route::get('dashboard', Profiles::class)->middleware('auth');

// Export
Route::get('users/export/', [Users::class, 'export'])->name('users.export')->middleware('auth');
Route::get('beneficiaires/export/', [Beneficiaires::class, 'export'])->name('beneficiaires.export')->middleware('auth');

// Route Espace Admin et Responsable
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});