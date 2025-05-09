<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'layouts_footer';

    protected $fillable = ['title', 'description'];
}
