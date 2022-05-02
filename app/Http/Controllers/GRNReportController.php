<?php

namespace App\Http\Controllers;

use App\Models\GRNReport;
use App\Models\Vendor;
use App\Models\Material;
use App\Models\SubMaterial;
use App\Models\Unit;
use Illuminate\Http\Request;

class GRNReportController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {
        echo "This is GRN list Method";
      // $reports = GRN::where('status', 'unread')->get();
    }

    public function CreatGrn(){
        $vendor = Vendor::all();
        $material = Material::all();
        $sub_material = SubMaterial::all();
        $unit = Unit::all();

        return view('KPO.GRN.add_grn_report', compact('vendor', 'material', 'sub_material', 'unit'));
    }

    public function UpdateGrn(Request $request){

        return $request;

    }

    
}
