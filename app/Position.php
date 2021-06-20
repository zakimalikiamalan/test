<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Position extends Model
{
    use softDeletes;
    protected $fillable = [
        'name'
    ];
}
