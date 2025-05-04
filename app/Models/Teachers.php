<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseTeacher;

class Teachers extends Model
{
    protected $table = 'teachers';

    protected $fillable = ['userName', 'avatar', 'skills', 'phoneNumber', 'email', 'introduce', 'banner', 'slug'];

    public static function getCountCourse($teacherId)
    {
        $countCourses = CourseTeacher::query()->where('teacherId', $teacherId)->count();
        if (isset($countCourses))
            return $countCourses;
        return 0;
    }
}
