<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
class Classroom extends Model
{
    use CrudTrait;
    protected $fillable = [
        'name',
        'teacher_id'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
