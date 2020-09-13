<?php

namespace App\Models\Fingerprint;

use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    use Relations;

    protected $fillable = [
        'fingerprint'
    ];
}
