<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classess extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subjects(){
        return $this->hasMany('App\Models\Admin\Subject');
    }

}
