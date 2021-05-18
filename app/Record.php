<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'weight',
        'calorie'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
