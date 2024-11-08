<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function coordinators()
    {
        return $this->hasMany(Coordinator::class)->orderBy('name', 'ASC');
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
