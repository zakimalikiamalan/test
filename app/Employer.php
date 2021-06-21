<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Employer extends Model
{
    use softDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'position_id',
        'departement_id',
        'office_id'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
