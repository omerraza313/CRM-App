@extends('KPO.layouts.masterDataTables')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Material</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <!-- left column -->
          <div class="col-md-12">

            <!------Blog Material List------>
            @error('name')
              <div class="alert alert-danger" role="alert">
               {{$message}}
              </div>
            @enderror
            

            @if(Session::Has('msg'))
                <div class="alert alert-danger" role="alert">
                  {{session::get('msg')}}
                </div>
                @endif

            <div class="card card-dafault">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                  Add Unit
                </button>
                
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No#</th>
                      <th>Unit Name</th>
                      <th>Unit Suffix</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($unit as $key=>$list)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$list->name}}</td>
                      <td>{{$list->unit_suffix}}</td>
                      <td class="py-0 align-middle">
                        <div class="btn-group btn-group">
                          <button class="btn btn-info" data-toggle="modal" data-target="#modal-edit-{{$list->id}}"><i class="fas fa-pen-square"></i><span style="margin-left: 5px;">Edit<span></button>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$list->id}}"><i class="fas fa-trash"></i><span style="margin-left: 5px;">Delete<span></button>
                        </div>
                      </td>
                    </tr> 

                    <!------------Delete Category Modal------------->
                    <div class="modal fade" id="modal-delete-{{$list->id}}">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete Unit</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="card-body">
                            <p>Do You Want to Delete <strong>{{$list->name}}</strong> Material</p>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{url('unit/delete-unit/')}}/{{$list->id}}" class="btn btn-danger">Delete</a>
                              </div>
                            
                          </div>
                          
                         
                        </div>
                     
                      </div>  
                    </div>
                    <!------------Delete Category Modal End-------------->
                    <!--------Edit Category Modal------->
            <div class="modal fade" id="modal-edit-{{$list->id}}">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{route('edit.unit')}}">
                      @csrf
                      <input type="text" name="id" value="{{$list->id}}" hidden="">
                      <div class="form-group">
                        <label for="Unit-name">Unit Name</label>
                        <input type="text" class="form-control" name="name" id="edit-unit-name" placeholder="Unit Name" value="{{$list->name}}">
                      </div>
                      <div class="form-group">
                        <label for="Unit-Suffix">Unit Suffix</label>
                        <input type="text" class="form-control" name="unit_suffix" id="edit-unit-suffix" placeholder="Unit Suffix" value="{{$list->unit_suffix}}">
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
                  
                 
                </div>
             
              </div>  
            </div>
            <!-- Edit Category End -->
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>


            <!------Blog Category List End------------->


            <!--------Add Category Modal------->
            <div class="modal fade" id="modal-add">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{route('create.unit')}}">
                      @csrf
                      <div class="form-group">
                        <label for="unit-name">Unit Name</label>
                        <input type="text" class="form-control" name="name" id="unit-name" placeholder="Unit Name" required="">
                      </div>
                      
                      <div class="form-group">
                        <label for="unit-suffix">Unit Suffix</label>
                        <input type="text" class="form-control" name="unit_suffix" id="unit-suffix" placeholder="Unit Suffix" required="">
                      </div>
                      
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add New</button>
                      </div>
                  </form>
                  </div>
                  

                </div>
             
              </div>  
            </div>
            <!-- Add Category End -->
            
          </div>   
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection 