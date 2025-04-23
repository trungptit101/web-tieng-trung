<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoStudent extends Model
{
    protected $table = 'videos_student';

    protected $fillable = ['text', 'video'];
}
