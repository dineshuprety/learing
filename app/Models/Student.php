<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Level::class,'level_id');
    }


}
