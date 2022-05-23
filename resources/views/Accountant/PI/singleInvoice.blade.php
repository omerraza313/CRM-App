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

				    <form method="POST" action="{{route('store.invoice')}}">
				    	@csrf

				    	<input type="id" name="grn_id" value="{{$grnId->id}}" hidden>
				        <div class="card-body">
				            <div class="form-group">
				                <label for="title">Good's Title</label>
				                <input type="text" class="form-control" id="good_title" placeholder="Good's Title" value="{{$grnId->title}}" disabled>
				            </div>
				            <div class="row">
				            	<div class="col-md-3">
				            		<div class="form-group">
						            	<label>Material UOM</label>
						            	<select class="form-control" id="uom_id" disabled>
						            		<option>{{$grnId->unit->name}}</option>
						            	
						            	</select>
						            </div>
				            	</div>
				            	<div class="col-md-3">
						            <div class="form-group">
						            	<label>Material Category</label>
						            	<select class="form-control" id="material_id" disabled>
						            		<option>{{$grnId->Material->name}}</option>
						            		
						            	</select>
						            </div>
				            	</div>
				            	<div class="col-md-3">
				            		<div class="form-group">
						            	<label>Sub Material Category</label>
						            	<select class="form-control" id="sub_matetial_id" disabled>
						            		<option>{{$grnId->SubMaterial->name}}</option>
						            	</select>
						            </div>
				            	</div>
				            	<div class="col-md-3">
				            		<div class="form-group">
						            	<label>Vendor</label>
						            	<select class="form-control" id="vendor_id" disabled>
						            		<option>{{$grnId->Vendor->name}}</option>
						            	</select>
						            </div>
				            	</div>
				            	
				            </div>

				            <div class="row">
				            	<div class="col-md-2">
				            		<div class="form-group">
						                <label for="qty">Total Quantity</label>
						                <input type="number" class="form-control" id="qty" placeholder="Good qty" value="{{$grnId->qty}}" disabled>
						            </div>
				            	</div>
				            	<div class="col-md-2">
				            		<div class="form-group">
						                <label for="vol_per_unit">Volume Per Unit</label>
						                <input type="number" class="form-control" id="vol_per_unit" placeholder="Good qty" value="{{$grnId->vol_per_unit}}" disabled>
						            </div>
				            	</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
				            			<label for="grn_date">Date</label>
				            			<input class="form-control" id="grn_date" placeholder="select date" value="{{$grnId->grn_date}}" disabled>
				            		</div>
				            	</div>
				            	<div class="col-md-4">
				            		<div class="form-group">
						                <label for="grn_note">GRN Note</label>   
						                <textarea class="form-control" disabled>
						                	{{$grnId->grn_note}}
						                </textarea>     
						            </div>
				            	</div>
				            </div>
				            <div class="row">
				            	<div class="col-md-3">
				            		<div class="form-group">
						                <label for="Good Price">Unit Price</label>
						                <input name="unit_price" type="number" class="form-control" id="good_price" placeholder="Enter Unit Price" required>
						            </div>
						            
				            	</div>

				            	<div class="col-md-3">
				            		<div class="form-group">
						                <label for="Good Price">Price</label>
						                <input name="good_price" type="number" class="form-control" id="good_price" placeholder="Enter Price" required>
						            </div>
				            	</div>
				            	<div class="col-md-3">
				            		<div class="form-group">
						                <label for="Good Sales Tax">Sales Tax Percentage</label>
						                <input name="good_sales_tax" type="number" class="form-control" id="good_sales_tax" placeholder="Enter Sales Tax Percantage (w/o % sign)" required>
						            </div>
				            	</div>
				            	<div class="col-md-3">
				            		<div class="form-group">
						                <label for="Good Income Tax">Income Tax Percentage</label>
						                <input name="good_income_tax" type="number" class="form-control" id="good_income_tax" placeholder="Enter IncomeTax Percantage (w/o % sign)" required>
						            </div>
				            	</div>
				            </div>
				        </div>
				                <!-- /.card-body -->

				        <div class="card-footer">
				            <button type="submit" class="btn btn-primary">
				            	Generate Invoice
				            </button>
				        </div>
				    </form>
				</div>
        	</div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	jQuery(document).ready(function(){
		jQuery('#material_id').change(function(){
			let mid = jQuery(this).val();
			jQuery('#sub_matetial_id').html('<option value="">Select Sub Material</option>')
			jQuery('#vendor_id').html('<option value="">Select Vendor</option>')
			jQuery.ajax({
				url:'/getSubMaterial',
				type:'post',
				data:'mid='+mid+'&_token={{csrf_token()}}',
				success:function(result){
					jQuery('#sub_matetial_id').html(result)
				}
			});
		});

		jQuery('#sub_matetial_id').change(function(){
			let smid = jQuery(this).val();
			jQuery.ajax({
				url:'/getVendor',
				type:'post',
				data:'smid='+smid+'&_token={{csrf_token()}}',
				success:function(result){
					jQuery('#vendor_id').html(result)
				}
			});
		});
	});
</script>

@endsection