<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortCheck extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip_address', 'host', 'port', 'output'
    ];
}
