<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\grupo;

class tarea extends Model
{
    public function grupo()
    {
        return $this->belongsTo(grupo::class);
    }
}
