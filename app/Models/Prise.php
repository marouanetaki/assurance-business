<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Prise extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function beneficiaire()
    {
        return $this->belongsTo(Beneficiaire::class, "beneficiaire_id");
    }

    protected $table = 'prises';
    protected $fillable = [
        'clinique',
        'beneficiaire_id',
        'user_id',
        'document',
        'type_operation'
    ];
}
