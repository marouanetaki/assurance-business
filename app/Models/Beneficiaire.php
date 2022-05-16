<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\User;

class Beneficiaire extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function dossiers()
    {
        return $this->hasMany(Dossier::class);
    }

    protected $table = 'beneficiaires';
    protected $fillable = [
        'nom',
        'date_naissance',
        'statut',
        'lien_parente',
        'document',
        'user_id'
    ];
}
