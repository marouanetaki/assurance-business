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
Route::get('dashboard/beneficiaires', Beneficiaires::class) ;
Route::get('dashboard/dossiers', Dossiers::class)->name('dossier.index') ;
Route::get('dashboard/details-dossiers/{id}', DetailDossiers::class)->name('dossier.detail');
Route::get('dashboard/accidents-de-travail', Accidents::class);
Route::get('dashboard/prise-en-charge', Prises::class);
Route::get('dashboard', Profiles::class);

// Export
Route::get('users/export/', [Users::class, 'export'])->name('users.export');

// Route Espace Admin et Responsable
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});