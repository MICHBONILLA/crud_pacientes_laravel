<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
public function Municipios()
    {
        return $this->hasMany(Municipio::class);
    }
}
