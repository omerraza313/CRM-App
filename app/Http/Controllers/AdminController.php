<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Material;
use App\Models\SubMaterial;
use App\Models\Unit;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function dashboard(){
        return view('Admin.dashboard.dashboard');
    }

    public function show_material(){
        $material = Material::all();
        return view('Admin.material.material', compact('material'));
    }

    public function create_material(Request $request){
        $request->validate([
            'name'=>'required|unique:materials',
        ]);
        
        /*******Converting slug to lowercase******/

        $str = $request->post('name');
        $str1 = strtolower($str);
        $str2 = str_replace(" ","-",$str1);

        /********Slug Converted*******/

        $model = new Material;
        $model->name = $request->post('name');
        $model->slug = $str2;
        $model->save();

        return redirect('/material')->with('success', 'Material Added');
    }

    public function edit_material(Request $request){
        
        $edit_material = Material::find($request->id);

        if ($edit_material->name == $request->name) {
            $edit_material->update();
            return redirect('/material')->with('success', 'Material Updated');
        }

        else{
            /*******Converting slug to lowercase******/

            $str = $request->post('name');
            $str1 = strtolower($str);
            $str2 = str_replace(" ","-",$str1);

            /********Slug Converted*******/

            $edit_material->name = $request->name;
            $edit_material->slug = $str2;
            $edit_material->update();
            return redirect('/material')->with('success', 'Material Updated');
            }
       // return $edit_category;

        
    }

    public function delete_material($id){
        $model = Material::find($id);
        // $blog_sub_category = $model->subcategories;
        // foreach($blog_sub_category as $sub_category){

        //     $sub_category->delete();
        // }
        $model->delete();
        
        return redirect('/material')->with('msg', 'Material Deleted');
    }
 /****Unit of Measurement****/

    public function show_unit(){
        $unit = Unit::all();
        return view('KPO.UOM.uom', compact('unit'));
    }

    public function create_unit(Request $request){
        $request->validate([
            'name'=>'required|unique:units',
        ]);
        
        /*******Converting slug to lowercase******/

        // $str = $request->post('name');
        // $str1 = strtolower($str);
        // $str2 = str_replace(" ","-",$str1);

        /********Slug Converted*******/

        $model = new Unit;
        $model->name = $request->post('name');
        $model->unit_suffix = $request->unit_suffix;
        $model->save();

        return redirect('/unit')->with('success', 'Unit Added');
    }

    public function edit_unit(Request $request){
        
        $edit_unit = Unit::find($request->id);

        if ($edit_unit->name == $request->name) {
            $edit_unit->update();
            return redirect('/unit')->with('success', 'Unit Updated');
        }

        else{
            /*******Converting slug to lowercase******/

            // $str = $request->post('name');
            // $str1 = strtolower($str);
            // $str2 = str_replace(" ","-",$str1);

            /********Slug Converted*******/

            $edit_unit->name = $request->name;
            $edit_unit->unit_suffix = $request->unit_suffix;
            $edit_unit->update();
            return redirect('/unit')->with('success', 'Unit Updated');
            }
       // return $edit_category;

        
    }

    public function delete_unit($id){
        $model = Unit::find($id);
        // $blog_sub_category = $model->subcategories;
        // foreach($blog_sub_category as $sub_category){

        //     $sub_category->delete();
        // }
        $model->delete();
        
        return redirect('/unit')->with('msg', 'Unit Deleted');
    }

/****SUB MATERIAL*****/

     public function sub_material(){

        $material = Material::all();
        $sub_material = SubMaterial::all();
        return view('Admin.material.sub_material', compact('material','sub_material'));

    }

     public function add_sub_material(Request $request){
        //return $request;
         $request->validate([
            'name'=>'required|unique:sub_materials',
            'code'=>'required|unique:sub_materials'
        ]);
        
        /*******Converting slug to lowercase******/

        $str = $request->post('name');
        $str1 = strtolower($str);
        $str2 = str_replace(" ","-",$str1);

        /********Slug Converted*******/

        $model = new SubMaterial;
        $model->name = $request->post('name');
        $model->slug = $str2;
        $model->material_id = $request->material_id;
        $model->code = $request->code;
        $model->save();
        return redirect('/sub_material')->with('success', 'Sub Material Inserted');

    }

    public function edit_sub_material(Request $request){

        // $request->validate([
        //     'name'=>'required|unique:sub_materials',
        //     'code'=> 'required|unique:sub_materials'
        // ]);
        
        $edit_sub_material = SubMaterial::find($request->id); //for speific entry

        if ($edit_sub_material->name == $request->name && $edit_sub_material->code == $request->code) {

            //$edit_sub_material->name = $request->post('name');
            //$edit_sub_material->slug = $str2;
            $edit_sub_material->material_id = $request->material_id;
            //$edit_sub_material->code = $request->code;
            $edit_sub_material->update();
            return redirect('/sub_material')->with('success', 'Sub Material is Updated with same Code and Name');
        }
        else{

            /*******Converting slug to lowercase******/
            $str = $request->post('name');
            $str1 = strtolower($str);
            $str2 = str_replace(" ","-",$str1);

            /********Slug Converted*******/

            $edit_sub_material->name = $request->post('name');
            $edit_sub_material->slug = $str2;
            $edit_sub_material->material_id = $request->material_id;
            $edit_sub_material->code = $request->code;
            $edit_sub_material->update();
            return redirect('/sub_material')->with('success', 'Sub Material Name and Code has been Updated');
        }

        
    }


     public function delete_sub_material($id)
    {
        $model = SubMaterial::find($id);
        
        $model->delete();
        
        return redirect('/sub_material')->with('danger', 'Sub Material Deleted');
    }



    /****VENDOR*****/

     public function vendor(){

        $sub_material = SubMaterial::all();
        $vendor = Vendor::all();
        return view('Admin.vendor.vendor', compact('sub_material','vendor'));

    }

     public function add_vendor(Request $request){
        //return $request;
         $request->validate([
            'username'=>'required|unique:vendors',
            'number'=>'required|unique:vendors'
        ]);
        
        /*******Converting slug to lowercase******/

        // $str = $request->post('name');
        // $str1 = strtolower($str);
        // $str2 = str_replace(" ","-",$str1);

        /********Slug Converted*******/

        $model = new Vendor;
        $model->name = $request->post('name');
        $model->username = $request->username;
        $model->sub_material_id = $request->sub_material_id;
        $model->reg_status = $request->reg_status;
        $model->ntn_status = $request->ntn_status;
        $model->strn_status = $request->strn_status;
        $model->address = $request->address;
        $model->number = $request->number;
        $model->save();
        return redirect('/vendor')->with('success', 'Vendor Has Been Added');

    }

    public function edit_vendor(Request $request){

        // //return $request;
        // $request->validate([
        //     'username'=>'required|unique:vendors'
        // ]);
        
        // /*******Converting slug to lowercase******/

        // $str = $request->post('name');
        // $str1 = strtolower($str);
        // $str2 = str_replace(" ","-",$str1);

        // /********Slug Converted*******/
        $edit_vendor = Vendor::find($request->id);

        if ($edit_vendor->username == $request->username) {

            $edit_vendor->name = $request->post('name');
            $edit_vendor->username = $request->username;
            $edit_vendor->sub_material_id = $request->sub_material_id;
            $edit_vendor->reg_status = $request->reg_status;
            $edit_vendor->ntn_status = $request->ntn_status;
            $edit_vendor->strn_status = $request->strn_status;
            $edit_vendor->address = $request->address;
            $edit_vendor->number = $request->number;
            $edit_vendor->update();
            return redirect('/vendor')->with('success', 'Vendor Has Been Updated');
        }
        else{
         return redirect('/vendor')->with('danger', 'User Name Cannot be changed');   
        }

        
    }


     public function delete_vendor($id)
    {
        $model = Vendor::find($id);
        
        $model->delete();
        
        return redirect('/vendor')->with('msg', 'Vendor Has Been Deleted');
    }
}
