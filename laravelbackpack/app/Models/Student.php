<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name',
        'email',
        'classroom_id'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
