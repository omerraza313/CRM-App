<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMaterial extends Model
{
    use HasFactory;

    public function Material(){
        return $this->belongsTo('App\Models\Material', 'material_id', 'id');
    }

    public function Vendor(){

        return $this->hasMany('App\Models\Vendor');
    }
    public function grnReports(){

        return $this->hasMany('App\Models\GRNReport');
    }
    
}
