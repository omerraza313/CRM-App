@extends('KPO.layouts.editor')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">GRN Reports</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
    <section class="content">
    	<div class="container-fluid">
        <div class="row d-flex justify-content-center">
        	<div class="col-md-12">
        		<div class="card">
					<div class="card-header"></div>

				    <form method="POST" action="{{route('kpo.insert.grn')}}" enctype="multipart/form-data">
				    	@csrf
				        <div class="card-body">
				            <div class="form-group">
				                <label for="title">Good's Title</label>
				                <input name="good_title" type="text" class="form-control" id="good_title" placeholder="Good's Title">
				            </div>
				            <div class="row">
				            	<div class="col-md-3">
				            		<div class="form-group">
						            	<label>Material UOM</label>
						            	<select class="form-control" id="uom_id" name="uom_id">
						            		<option value="">Select UOM</option>
						            		@foreach($unit as $ey=>$val)
						            		 <option value="{{$val->id}}">{{$val->name}} <small> ( {{$val->unit_suffix}} )</small></option>
						            		@endforeach
						            	</select>
						            </div>
				            	</div>
				            	<div class="col-md-3">
						            <div class="form-group">
						            	<label>Material Category</label>
						            	<select class="form-control" id="material_id" name="material_id">
						            		<option value="">Select Material</option>
						            		@foreach($material as $key=>$list)
						            		<option value="{{$list->id}}">{{$list->name}}</option>
						            		@endforeach
						            	</select>
						            </div>
				            	</div>
				            	<div class="col-md-3">
				            		<div class="form-group">
						            	<label>Sub Material Category</label>
						            	<select class="form-control" id="sub_matetial_id" name="sub_material_id">
						            		
						            	</select>
						            </div>
				            	</div>
				            	<div class="col-md-3">
				            		<div class="form-group">
						            	<label>Vendor</label>
						            	<select class="form-control" id="vendor_id" name="vendor_id">
						            		
						            	</select>
						            </div>
				            	</div>
				            	
				            </div>
				            <!-- <div class="row">
				            	<div class="col-md-4">
				            		<div class="form-group">
						                <label for="Good Price">Price</label>
						                <input name="good_price" type="text" class="form-control" id="good_price" placeholder="Enter Price">
						            </div>
				            	</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
						                <label for="Good Sales Tax">Sales Tax Percentage</label>
						                <input name="good_sales_tax" type="text" class="form-control" id="good_sales_tax" placeholder="Enter Sales Tax Percantage (w/o % sign)">
						            </div>
				            	</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
						                <label for="Good Income Tax">Income Tax Percentage</label>
						                <input name="good_income_tax" type="text" class="form-control" id="good_income_tax" placeholder="Enter IncomeTax Percantage (w/o % sign)">
						            </div>
				            	</div>
				            </div> -->

				            <div class="form-group">
				                <label for="body">GRN Note</label>   
				                <textarea name="body" class="form-control">
				                	
				                </textarea>
				                 
				            </div>

				        </div>
				                <!-- /.card-body -->

				        <div class="card-footer">
				            <button type="submit" class="btn btn-primary">
				            	Add
				            </button>
				        </div>
				    </form>
				</div>
        	</div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



@endsection