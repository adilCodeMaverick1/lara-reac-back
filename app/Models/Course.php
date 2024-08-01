<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_course', 'course_id', 'class_id');
    }
}
