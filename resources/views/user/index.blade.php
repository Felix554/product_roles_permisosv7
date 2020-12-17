@extends('layouts.admin')

@section('titulo', 'Administración de Usuario')

@section('estilos')
  <!-- DataTables -->
  <link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('contenido')
 <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Usuarios</h3>
                <a class="btn btn-primary float-right" href="{{ route('role.create')}}">Create</a><br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="user" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role(s)</th>
                      <th colspan="1">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)

                            <tr>
                              <th scope="row">{{ $user->id}}</th>
                              <td >{{ $user->name}}</td>
                              <td >{{ $user->email}}</td>
                              <td >
                                @isset($user->roles[0]->name){{--Si tiene un rol asignado que lo muestr--}}
                                  {{ $user->roles[0]->name }}
                                @endisset
                              </td>
                              <td >
                                @can('view',[$user,['user.show','userown.show']])
                                  <a class="btn btn-info" href="{{ route('user.show',$user->id)}}">Show</a>
                                  <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                @endcan
                                
                                @can('view',[$user,['user.edit','userown.edit']])
                                  <a class="btn btn-success" href="{{ route('user.edit',$user->id)}}">Edit</a>

                                  <a href="#" class="btn btn-info"><i class="fas fa-user-edit">Editar</i></a>

                                  <a href="#" class="">
                                  <i class="fas fa-user-edit">Editar</i>
                                  </a>

                                  <a class="btn btn-info btn-sm" href="#">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                                  </a>
                                  
                                  <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                  </a>
                                @endcan 
                                @can('haveaccess','user.destroy')
                                <form action="{{ route('user.destroy',$user->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">Delete</button>
                                </form>
                                @endcan
                              </td>
                            </tr>
                            
                            @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role(s)</th>
                    <th colspan="1">Acciones</th>
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
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Listado de users</h2></div>

                <div class="card-body">
                {{--@include('custom.message')--}}
                        <!--<a class="btn btn-primary float-right" href="{{-- route('user.create')--}}">Create</a><br>-->

                        <!--<table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Role(s)</th>
                              <th colspan="3"></th>
                            </tr>
                          </thead>
                          <tbody>
                            

                            
                           
                          </tbody>
                        </table>
                        {{-- $users->links() --}}
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection

@section('script')
<!-- DataTables -->
<script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#user").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@endsection