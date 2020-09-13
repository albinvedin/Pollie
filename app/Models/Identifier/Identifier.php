<?php

namespace App\Models\Identifier;

use Illuminate\Database\Eloquent\Model;

class Identifier extends Model
{
    use Relations;

    protected $fillable = [
        'identifierable_id',
        'identifierable_type'
    ];
}
