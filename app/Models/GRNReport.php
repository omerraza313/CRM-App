<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GRNReport extends Model
{
    use HasFactory;

    public function Material(){

        return $this->belongsTo('App\Models\Material');
    }

    public function SubMaterial(){

        return $this->belongsTo('App\Models\SubMaterial');
    }

    public function Vendor(){

        return $this->belongsTo('App\Models\Vendor');
    }

    public function unit(){

        return $this->belongsTo('App\Models\Unit');
    }

    public function purchaseInvoice(){

        return $this->hasOne('App\Models\PurchaseInvoice');
    }
}
