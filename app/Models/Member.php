<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nik',
        'name',
        'no_hp',
        'village_id',
        'coordinator_id'
    ];

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }
    
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
