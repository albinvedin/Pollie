<?php

namespace App\Models\Vote;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use Relations, Scopes, Functions;

    protected $fillable = [
        'voteable_id',
        'voteable_type'
    ];
}
