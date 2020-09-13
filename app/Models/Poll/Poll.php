<?php

namespace App\Models\Poll;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use Relations, Functions;

    protected $fillable = [
        'question',
        'multiple_choice',
        'starts_at',
        'ends_at'
    ];

    protected $dates = [
        'starts_at',
        'ends_at'
    ];
}
