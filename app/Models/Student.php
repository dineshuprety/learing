<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'name',
        'image'
    ];

    // protected $hidden = [
    //     'level_id'
    // ];


}
