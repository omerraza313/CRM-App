<?php

namespace App\Http\Controllers;

use App\Models\GRNReport;
use App\Models\Vendor;
use App\Models\Material;
use App\Models\SubMaterial;
use App\Models\Unit;
use Illuminate\Http\Request;
use Auth;

class GRNReportController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {
        //echo "This is GRN list Method";
       $reports = GRNReport::where('read_status', 0)->get();
       $unit = Unit::all();
       $material = Material::all();
       $sub_material = SubMaterial::all();
       $vendor = Vendor::all();
       return view('KPO.GRN.index', compact('reports', 'unit', 'material', 'sub_material', 'vendor'));
       //return $reports;
    }

    public function AddGrn(){
        //$vendor = Vendor::all();
        $material = Material::all();
        //$sub_material = SubMaterial::all();
        $unit = Unit::all();

        return view('KPO.GRN.add_grn_report', compact('material', 'unit'));
    }

    public function getSubMaterial(Request $request)
    {
        $m_id = $request->post('mid');
        $sub_material = SubMaterial::where('material_id', $m_id)->get();
        $html = '<option value="">Select Sub Material</option>';

        foreach ($sub_material as $key => $list) {
            $html.='<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }

    public function getVendor(Request $request)
    {
        $sm_id = $request->post('smid');
        $vendor = Vendor::where('sub_material_id', $sm_id)->get();
        $html = '<option value="">Select Vendor</option>';
        
        foreach ($vendor as $key => $list) {
            $html.='<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }

    public function CreateGrn(Request $request){

        //return $request;
        $model = new GRNReport;
        $model->title = $request->title;
        $model->unit_id = $request->uom_id;
        $model->material_id = $request->material_id;
        $model->sub_material_id = $request->sub_material_id;
        $model->vendor_id = $request->vendor_id;
        if($request->qty > 0){
           $model->qty = $request->qty; 
        }
        else{
            return redirect('grn_add')->with('qty', 'Quantity must be at least 1');
        }
        if($request->vol_per_unit){
            $model->vol_per_unit =$request->vol_per_unit;
        }
        else{
            return redirect()->with('vol', 'Volume per unit must be at least 1');
        }
        //date format
        $str = $request->post('grn_date');
        $str2 = str_replace("T","-time-",$str);
        $model->grn_date = $str2;
        $model->grn_note = $request->grn_note;
        $model->read_status = 0;
        $model->edit_status = 0;

        $model->save();

        return redirect()->back();
    }

   public function deleteGRN($id){
        $model = GRNReport::find($id);
        $model->delete();
        
        return redirect('/grn')->with('msg', 'GRN Deleted');
    //echo "this is delete route";
    }
    
}
