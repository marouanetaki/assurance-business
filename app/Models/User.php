<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Beneficiaire;
use App\Models\Dossier;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'entreprise',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function beneficiaires()
    {
        return $this->hasMany(Beneficiaire::class);
    }

    public function dossiers()
    {
        return $this->hasMany(Dossier::class);
    }
}
