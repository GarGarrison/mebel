<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Similar extends Model
{
    public $timestamps = false;

    protected $guarded = [
        'id',
    ];
}
