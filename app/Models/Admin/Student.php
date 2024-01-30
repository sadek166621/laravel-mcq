<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function class(){
        return $this->belongsTo(Classess::class, 'class_id','id');
    }

    public function subjects(){
        return $this->hasMany('App\Models\Admin\Studentsub');
    }
}
