<?php

namespace App\Http\Controllers;

use App\Models\GRNReport;
use App\Models\Vendor;
use App\Models\Material;
use App\Models\SubMaterial;
use Illuminate\Http\Request;

class GRNReportController extends Controller
{
    
    public function index()
    {
        echo "This is GRN list Method";
      // $reports = GRN::where('status', 'unread')->get();
    }

    public function CreatGrn(){
        $vendor = Vendor::all();
        $material = Material::all();
        $sub_material = SubMaterial::all();

        return view('KPO.GRN.add_grn_report', compact('vendor', 'material', 'sub_material'));
    }

    public function UpdateGrn(Request $request){

        return $request;

    }

    
}
