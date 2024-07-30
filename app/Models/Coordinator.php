<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coordinator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'slug',
        'no_hp',
        'village_id',
        'category_id'
    ];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
