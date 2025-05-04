<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{

    protected $table = 'courses';

    protected $fillable = ['title', 'avatar', 'description', 'infomationCourse', 'outputCourse', 'interestCourse', 'slug', 'descriptionDocument', 'quote', 'resources', 'calendarOpening'];
}
