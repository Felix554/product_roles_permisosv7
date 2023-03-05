@extends('plantilla.admin1')

@section('titulo', 'Administración de Rol')

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">-->

@section('estilos')
  <!-- DataTables -->
  <link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
  <!-- Theme style -->
  <!--<link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">-->

@section('contenido')
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!--<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
            </div>-->
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Roles</h3>
                <a class="btn btn-primary float-right" href="{{ route('role.create')}}">Create</a><br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="rol" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Full Access</th>
                    <th>CSS grade</th>
                    <th>CSS grade</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($roles as $role)

                            <tr>
                              <th scope="row">{{ $role->id}}</th>
                              <td >{{ $role->name}}</td>
                              <td >{{ $role->slug}}</td>
                              <td >{{ $role->description}}</td>
                              <td >{{ $role['full-access']}}</td>
                              <td >
                                @can('haveaccess','role.show')
                                  <a class="btn btn-info" href="{{ route('role.show',$role->id)}}">Show</a>
                                @endcan
                                </td>
                              <td >
                                @can('haveaccess','role.edit')
                                  <a class="btn btn-success" href="{{ route('role.edit',$role->id)}}">Edit</a>
                                @endcan
                                </td>
                              <td >
                                @can('haveaccess','role.destroy')
                                <form action="{{ route('role.destroy',$role->id)}}" method="POST">
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
                    <th>#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Full Access</th>
                    <th>CSS grade</th>
                    <th>CSS grade</th>
                    <th>CSS grade</th>
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
@endsection
  

<!-- jQuery -->
<!--<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!--<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
@section('script')
<!-- DataTables -->
<script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#rol").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    /*$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });*/
  });
</script>
@endsection

<!-- AdminLTE App -->
<!--<script src="adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="adminlte/dist/js/demo.js"></script>

<!--</body>
</html>-->
