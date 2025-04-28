<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterAdvise extends Model
{
    protected $table = 'register_advise';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'course'
    ];
}
