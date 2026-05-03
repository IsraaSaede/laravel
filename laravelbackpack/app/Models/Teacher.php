<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use CrudTrait;

  protected $fillable = ['name', 'subject_id'];

public function subject()
{
    return $this->belongsTo(Subject::class);
}
}
