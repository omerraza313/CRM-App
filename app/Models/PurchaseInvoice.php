<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['grn_id','unit_price','good_price','good_sales_tax','good_income_tax'];

    public function grnReport(){

        return $this->belongsTo('App\Models\GRNReport', 'id', 'grn_id');
    }


}