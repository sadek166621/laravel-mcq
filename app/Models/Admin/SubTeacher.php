<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTeacher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function class(){
        return $this->belongsTo(Classess::class, 'classess_id','id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class, 'teacher_id','id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function teachercls(){
        return $this->belongsTo(Classess::class, 'class_id');
    }
}
