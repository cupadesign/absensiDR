<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $primaryKey = 'ID';

    public $timestamps = true;

    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [

        'NAME',

        'LATITUDE',

        'LONGITUDE',

        'RADIUS'

    ];
}
