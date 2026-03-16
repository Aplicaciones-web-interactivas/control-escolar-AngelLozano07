<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\horario;

class grupo extends Model
{
    public function horarios()
    {
        return $this->belongsTo(horario::class);
    }
}
