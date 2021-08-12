<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintaince extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function MaintainceCategory()
    {
        return $this->belongsTo(MaintainceCategory::class);
    }
    public function event()
    {
        return $this->belongsTo(event::class);
    }

}
