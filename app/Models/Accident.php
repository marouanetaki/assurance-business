<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Accident extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    protected $table = 'accidents';
    protected $fillable = [
        'lieu',
        'heure',
        'cause',
        'tel',
        'user_id'
    ];
}
