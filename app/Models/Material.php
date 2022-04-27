<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function SubMaterial(){

        return $this->hasMany('App\Models\SubMaterial');
    }

    public function Vendor(){

        return $this->hasMany('App\Models\Vendor');
    }
}
