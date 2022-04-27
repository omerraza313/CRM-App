@extends('Admin.layouts.masterDataTables')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Vendor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           
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

            @if(Session::has('success'))
             <div>
               <span class="alert alert-info py-2 px-4">{{ Session('success') }}</span>
             </div>
            @endif

            @if(Session::has('danger'))
             <div>
               <span class="alert alert-danger py-2 px-4">{{ Session('danger') }}</span>
             </div>
            @endif

            <div class="card card-dafault">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                  Add Vendor
                </button>
               
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No#</th>
                      <th>Vendor Name</th>
                      <th>Vendor UserName</th>
                      <th>Material Category</th>
                      <th>Registration Status</th>
                      <th>NTN Status</th>
                      <th>STRN Status</th>
                      <th>Number</th>
                      <th>Address</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($vendor as $key=>$list)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$list->name}}</td>
                      <td>{{$list->username}}</td>
                      <td>{{$list->Material->name}}</td>
                      <td>{{$list->reg_status}}</td>
                      <td>{{$list->ntn_status}}</td>
                      <td>{{$list->strn_status}}</td>
                      <td>{{$list->number}}</td>
                      <td>{{$list->address}}</td>
                      <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                          <button class="btn btn-info" data-toggle="modal" data-target="#modal-edit-{{$list->id}}"><i class="fas fa-pen-square"></i></button>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$list->id}}"><i class="fas fa-trash"></i></button>
                        </div>
                      </td>
                    </tr> 

                    <!------------Delete Category Modal------------->
                    <div class="modal fade" id="modal-delete-{{$list->id}}">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Vendor</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="card-body">
                            <p>Do You Want to Delete <strong>{{$list->name}}</strong> Vendor</p>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{url('vendor/delete/')}}/{{$list->id}}" class="btn btn-danger">Delete</a>
                              </div>
                            
                          </div>
                          
                         
                        </div>
                     
                      </div>  
                    </div>
                    <!------------Delete Category Modal End-------------->
                    <!--------Edit Vendor Modal------->
                        <div class="modal fade" id="modal-edit-{{$list->id}}">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Vendor</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="card-body">
                                <form method="POST" action="{{url('vendor/edit/')}}">
                                  @csrf
                                  <input type="text" name="id" value="{{$list->id}}" hidden="">
                                  <div class="form-group">
                                    <label for="vendor-name">Vendor Name</label>
                                    <input type="text" class="form-control" name="name" id="vendor-name" placeholder="Vendor Name" value="{{$list->name}}">
                                  </div>

                                  <div class="form-group">
                                    <label for="vendor-username">User Name</label>
                                    <input type="text" class="form-control" name="username" id="vendor-user-name" placeholder="Vendor User Name" value="{{$list->username}}">
                                  </div>
                                
                                  <div class="form-group">
                                    <label for="parent-material-type">Vendor Material Type</label>
                                    <div class="input-group">
                                      <select class="form-control" name="material_id" required="">
                                       <option value="{{$list->Material->id}}" selected>{{$list->Material->name}}</option>
                                        @foreach($material as $key=>$mat)
                                        <option value="{{$mat->id}}">{{$mat->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="registration-status">Registration Status</label>
                                        <select class="form-control" name="reg_status">
                                          @if($list->reg_status != 'inactive')
                                              <option value="{{$list->reg_status}}" selected>{{$list->reg_status}}</option>
                                              <option value="inactive">Inactive</option>
                                          @else
                                            <option value="{{$list->reg_status}}" selected>{{$list->reg_status}}</option>
                                            <option value="active">Active</option>
                                          @endif
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="ntn-status">NTN Status</label>
                                        <select class="form-control" name="ntn_status">
                                          @if($list->ntn_status != 'inactive')
                                              <option value="{{$list->ntn_status}}" selected>{{$list->ntn_status}}</option>
                                              <option value="inactive">Inactive</option>
                                          @else
                                            <option value="{{$list->ntn_status}}" selected>{{$list->ntn_status}}</option>
                                            <option value="active">Active</option>
                                          @endif
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="strn-status">STRN Status</label>
                                        <select class="form-control" name="strn_status">
                                          @if($list->strn_status != 'inactive')
                                              <option value="{{$list->strn_status}}" selected>{{$list->strn_status}}</option>
                                              <option value="inactive">Inactive</option>
                                          @else
                                            <option value="{{$list->strn_status}}" selected>{{$list->strn_status}}</option>
                                            <option value="active">Active</option>
                                          @endif
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="number">Number</label>
                                        <input type="text" class="form-control" name="number" id="number" placeholder="number" value="{{$list->number}}">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{$list->address}}">
                                      </div>
                                    </div>
                                  </div> 
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                                </form>
                              </div>
                              
                             
                            </div>
                         
                          </div>  
                        </div>
                    <!---------- Edit Vendor End ------->
                    @endforeach        
                  </tbody>
                </table>
              </div>
            </div>


            <!------Vendor List End------------->


            <!--------Add Vendor Modal------->
            <div class="modal fade" id="modal-add">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add Vendor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{route('add.vendor')}}">
                      @csrf
                      <div class="form-group">
                        <label for="vendor-name">Vendor Name</label>
                        <input type="text" class="form-control" name="name" id="edit-vendor-name" placeholder="Vendor Name" required="">
                          
                      </div>

                      <div class="form-group">
                        <label for="vendor-username">Vendor Name</label>
                        <input type="text" class="form-control" name="username" id="edit-vendor-user-name" placeholder="Vendor User Name" required="">
                          
                      </div>
                      
                      <div class="form-group">
                        <label for="Parent Category">Vendor Material Type</label>
                        <div class="input-group">
                          <select class="form-control" name="material_id" required="">
                            <option value="">Select Material</option>
                            @foreach($material as $key=>$mat)
                            <option value="{{$mat->id}}">{{$mat->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="row">

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="registration-status">Registration Status</label>
                              <select class="form-control" name="reg_status">
                                <option value="">Select Option</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="ntn-status">NTN Status</label>
                              <select class="form-control" name="ntn_status">
                                <option value="">Select Option</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="strn-status">STRN Status</label>
                              <select class="form-control" name="strn_status">
                                <option value="">Select Option</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                              </select>
                            </div>
                          </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="number">Number</label>
                            <input type="text" class="form-control" name="number" id="edit-number" placeholder="number">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="edit-address" placeholder="address">
                          </div>
                        </div>
                      </div>
                     
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </div>
                  </form>
                  </div>
                  

                </div>
             
              </div>  
            </div>
            <!-- Add Vendor End -->
            
          </div>   
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection