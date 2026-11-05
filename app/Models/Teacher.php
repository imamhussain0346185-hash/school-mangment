<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $guarded = ['id'];

    public function classes()
    {
        return $this->hasMany(SchoolClass::class, 'class_teacher_id');
    }
}
