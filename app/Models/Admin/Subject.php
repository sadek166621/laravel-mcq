<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function class(){
        return $this->belongsTo(Classess::class, 'classess_id','id');
    }

    public function sub_teachers(){
        return $this->hasMany('App\Models\Admin\SubTeacher');
    }

}
