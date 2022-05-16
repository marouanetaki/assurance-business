<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Dossier extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, "beneficiaire_id");
    }

    protected $table = 'dossiers';
    protected $fillable = [
        'num_dossier',
        'date_depot',
        'date_remboursement',
        'frais_consultation',
        'frais_pharmacie',
        'frais_analyse',
        'total',
        'frais_rembourse',
        'satut',
        'beneficiaire_id',
        'user_id',
        // 'documents',
        'date_soins',
    ];
}
