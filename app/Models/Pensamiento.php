<?php

namespace App\Models;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pensamiento extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','description','user_id'];

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

    public function getUpdateAtAttribute($date)
    {
        return new Date($date);
    }

    
}
