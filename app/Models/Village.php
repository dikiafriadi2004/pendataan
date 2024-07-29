<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Village extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function coordinators()
    {
        return $this->hasMany(Coordinator::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
