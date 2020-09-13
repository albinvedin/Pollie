<?php

namespace App\Models\PollOption;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    use Relations;

    protected $fillable = [
        'poll_id',
        'text'
    ];
}
