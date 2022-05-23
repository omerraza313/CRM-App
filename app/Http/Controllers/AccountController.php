<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Material;
use App\Models\SubMaterial;
use App\Models\Unit;
use App\Models\GRNReport;
use App\Models\PurchaseInvoice;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accountant.dash');
    }

    public function purchaseInvoice(){

        $reports = GRNReport::where('read_status', 0)->get();
    
       return view('Accountant.PI.purchaseInvoice', compact('reports'));
    }
    public function oldInvoices(){

        $reports = GRNReport::where('read_status', 1)->get();
    
       return view('Accountant.PI.purchaseInvoice', compact('reports'));
    }
    

    public function singleInvoice(GRNReport $grnId){

        return view('Accountant.PI.singleInvoice', compact('grnId'));
    }

    public function storeInvoice(Request $request){

         //return $request;
       
        $unit_price = (float)$request->unit_price;
        $good_price = (float)$request->good_price;

        //Sales Tax Handling
        $good_sales_tax = (float)$request->good_sales_tax;
        $good_sales_tax = $good_sales_tax/100;

        //Income Tax Handling
        $good_income_tax = (float)$request->good_income_tax;
        $good_income_tax = $good_income_tax/100;

        //calculating the iunclusive price

        $sale_tax = $good_price*$good_sales_tax;
        $good_price = $good_price+$sale_tax;

        if($good_income_tax>0){
            $income_tax = $good_price*$good_income_tax;
            $good_price = $good_price - $income_tax;
        }
        else{
            $good_price = $good_price - 0;
        }


        $invoice = new PurchaseInvoice;
        $invoice->grn_id = $request->grn_id;
        $invoice->unit_price = $unit_price;
        $invoice->good_price = $good_price;
        $invoice->good_sales_tax = $good_sales_tax*100;
        $invoice->good_income_tax = $good_income_tax*100;
        $invoice->inclusive_price = $good_price;
        $invoice->save();
       //echo gettype($unit_price);
          
        // PurchaseInvoice::create($request->all());

        GRNReport::where('id', $request->grn_id)
                    ->update([

                        'read_status' => 1

                    ]);

        return redirect('purchase-invoices');
    }


    

}
