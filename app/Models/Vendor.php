<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    // public function Material(){
    //     return $this->belongsTo('App\Models\Material');
    // }

    public function SubMaterial(){
        return $this->belongsTo('App\Models\SubMaterial', 'sub_material_id', 'id');
    }
    public function grnReports(){

        return $this->hasMany('App\Models\GRNReport');
    }
}
