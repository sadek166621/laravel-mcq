<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function class()
    // {
    //     return $this->belongsTo(Classess::class);
    // }

    // public function teacher()
    // {
    //     return $this->belongsTo(Teacher::class);
    // }
}
