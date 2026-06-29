<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*
    |--------------------------------------------------------------------------
    | CUSTOM TABLE
    |--------------------------------------------------------------------------
    */

    protected $primaryKey = 'ID';

    const CREATED_AT = 'CREATED_AT';

    const UPDATED_AT = 'UPDATED_AT';

    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNMENT
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'USERNAME',

        'PASSWORD',

        'NAMA',

        'NIP',

        'ROLE',

        'SIMGOS_ID',

        'IS_ACTIVE',

    ];

    /*
    |--------------------------------------------------------------------------
    | HIDDEN
    |--------------------------------------------------------------------------
    */

    protected $hidden = [

        'PASSWORD',

        'remember_token',

    ];

    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected function casts(): array
    {
        return [

            'PASSWORD' => 'hashed',

        ];
    }
    /*
    |--------------------------------------------------------------------------
    | AUTH PASSWORD
    |--------------------------------------------------------------------------
    */

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }
}
