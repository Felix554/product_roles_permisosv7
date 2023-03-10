@extends('plantilla.admin1')


@section('titulo','Administración de Categoría')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

        <!-- /.row -->
        <div id="confirmareliminar" class="row">
        <span style="display: none;" id="urlbase">{{ route('admin.category.index')}}</span>{{--URL Base PARA ENVIAR ID--}}
        
        @include('custom.modal_eliminar') <!-- Nos muestra el modal para comfirmar la eliminacion -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sección de Categorías</h3>

                <div class="card-tools">

                  <form>
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="nombre" class="form-control float-right" 
                      placeholder="Buscar"
                      value="{{ request()->get('nombre')}}" 
                      >

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>

                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
              	<a class="m-2 float-right btn btn-primary" href="{{route('admin.category.create')}}">Crear</a>
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Slug</th>
                      <th>Descripcion</th>
                      <th>Fecha Creación</th>
                      <th>Fecha Modificación</th>
                       <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>

                  	@foreach($categorias as $categoria)

	                    <tr>
	                      <td>{{$categoria->id}}</td>
	                      <td>{{$categoria->nombre}}</td>
	                      <td>{{$categoria->slug}}</td>
	                      <td>{{$categoria->descripcion}}</td>
	                      <td>{{$categoria->created_at}}</td>
	                      <td>{{$categoria->updated_at}}</td>

	                      <td><a class="btn btn-default" href="{{route('admin.category.show',$categoria->slug)}}"><i class="far fa-eye"></i></a></td>
	                      <td><a class="btn btn-info" href="{{route('admin.category.edit',$categoria->slug)}}"><i class="far fa-edit"></i></a></td>
	                      <td>
                          <a class="btn btn-danger" 
                          href="{{route('admin.category.index')}}" 
	                      	
                          v-on:click.prevent="deseas_eliminar({{$categoria->id}})">{{--PARA EL MODAL custom.modal_eliminar--}}
	                      	Eliminar
	                      	</a>
	                      </td>
	                      
	                    </tr>
	                 
                    @endforeach

                  </tbody>
                </table>
                {{ $categorias->appends($_GET)->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->

@endsection