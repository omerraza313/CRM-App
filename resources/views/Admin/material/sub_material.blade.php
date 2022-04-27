@extends('Admin.layouts.masterDataTables')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub Material</h1>
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

            <!------Blog Category List------>
            @error('name')
              
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
                  Add Sub Material
                </button>
               
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No#</th>
                      <th>Parent Material</th>
                      <th>Material</th>
                      <th>Slug</th>
                      <th>Code</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($sub_material as $key=>$list)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$list->Material->name}}</td>
                      <td>{{$list->name}}</td>
                      <td>{{$list->slug}}</td>
                      <td>{{$list->code}}</td>
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
                            <h4 class="modal-title">Sub Material</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="card-body">
                            <p>Do You Want to Delete <strong>{{$list->name}}</strong> Sub Material</p>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{url('sub-material/delete/')}}/{{$list->id}}" class="btn btn-danger">Delete</a>
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
                    <h4 class="modal-title">Sub Material</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{route('edit.sub_material')}}">
                      @csrf
                      <input type="text" name="id" value="{{$list->id}}" hidden="">
                      <div class="form-group">
                        <label for="sub-material-name">Sub Material Name</label>
                        <input type="text" class="form-control" name="name" id="sub-material-name" placeholder="Sub Material Name" value="{{$list->name}}" required="">
                      </div>
                    
                      <div class="form-group">
                        <label for="parent-material">Parent Material</label>
                        <div class="input-group">
                          <select class="form-control" name="material_id" required="">
                           <option value="{{$list->Material->id}}" selected>{{$list->Material->name}}</option>
                            @foreach($material as $key=>$mat)
                            <option value="{{$mat->id}}">{{$mat->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="sub-material-code">Material Code</label>
                        <input type="text" class="form-control" name="code" id="sub-material-code" placeholder="Sub Material Code" value="{{$list->code}}" required="">
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
                    <h4 class="modal-title">Add Sub Material</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{route('add.sub_material')}}">
                      @csrf
                      <div class="form-group">
                        <label for="sub-material-name">Sub Material Name</label>
                        <input type="text" class="form-control" name="name" id="sub-material-name" placeholder="Sub Material Name" required="">
                          
                      </div>
                      
                     
                      <div class="form-group">
                        <label for="Parent Category">Parent Material</label>
                        <div class="input-group">
                          <select class="form-control" name="material_id" required="">
                            <option value="">Select Material</option>
                            @foreach($material as $key=>$mat)
                            <option value="{{$mat->id}}">{{$mat->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="sub-material-code">Material Code</label>
                        <input type="text" class="form-control" name="code" id="sub-material-code" placeholder="Sub Material Code" required="">
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
            <!-- Add Category End -->
            
          </div>   
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection