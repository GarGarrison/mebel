<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialProperty extends Model
{
    public $table = "special_properties";

    public $timestamps = false;

    protected $guarded = [
        'id',
    ];
}
