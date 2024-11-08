<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'no_hp',
        'tps',
        'village_id',
        'coordinator_id'
    ];

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class)->orderBy('name', 'ASC');
    }
    
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
