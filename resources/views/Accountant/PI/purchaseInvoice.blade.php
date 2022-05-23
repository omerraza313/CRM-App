@extends('Accountant.layouts.masterDataTables')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">GRN Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">GRN</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if(Session::Has('qty'))
              <div class="alert alert-danger">
                {{Session::get('qty')}}
              </div>
            @endif
            @if(Session::Has('vol'))
              <div class="alert alert-danger">
                {{Session::get('vol')}}
              </div>
            @endif
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="{{route('kpo.create.grn')}}" class="btn btn-primary">Add GRN</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr #</th>
                    <th>Title</th>
                    <th>UOM</th>
                    <th>Material</th>
                    <th>Sub-Material</th>
                    <th>Vendor</th>
                    <th>Quantity</th>
                    <th>Per Unit Quantity</th>
                    <th>Date</th>
                    <th>GRN Note</th>
                    <th>Read Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($reports as $key=>$list)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$list->title}}</td>
                    <td>{{$list->unit->name}}</td>
                    <td>{{$list->Material->name}}</td>  
                    <td>{{$list->SubMaterial->name}}</td>                   
                    <td>{{$list->Vendor->name}}</td>  
                     

                      <td>{{$list->qty}}</td>
                      <td>{{$list->vol_per_unit}}</td>
                      <td>{{$list->grn_date}}</td>
                      <td>{{$list->grn_note}}</td>
                      <td>{{$list->read_status}}</td>
                      <td>
                        <a href="{{ url('single-invoice')}}/{{$list->id}}" class="btn btn-danger"><i class="fas fa-eye"></i></a>
                        
                      </td>
                      

                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>Sr #</th>
                    <th>Title</th>
                    <th>UOM</th>
                    <th>Material</th>
                    <th>Sub-Material</th>
                    <th>Vendor</th>
                    <th>Quantity</th>
                    <th>Per Unit Quantity</th>
                    <th>Date</th>
                    <th>GRN Note</th>
                    <th>Read Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection