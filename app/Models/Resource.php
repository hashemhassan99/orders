<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ResourceCategory()
    {
        return $this->belongsTo(ResourceCategory::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function event()
    {
        return $this->belongsTo(event::class);
    }

}
