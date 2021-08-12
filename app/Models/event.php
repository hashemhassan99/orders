<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
    public function maintainces()
    {
        return $this->hasMany(Maintaince::class);
    }

    public function statues()
    {
        return $this->hasMany(Status::class);
    }
}
