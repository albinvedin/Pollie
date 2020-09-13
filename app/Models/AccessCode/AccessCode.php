<?php

namespace App\Models\AccessCode;

use Illuminate\Database\Eloquent\Model;

class AccessCode extends Model
{
    use Relations;

    protected $fillable = [
        'poll_id',
        'code'
    ];
}
