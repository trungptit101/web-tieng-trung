<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    protected $table = 'courses_teacher';

    protected $fillable = ['title', 'link', 'slug', 'teacherId'];
}
