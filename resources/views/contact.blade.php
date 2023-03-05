@extends('plantilla.admin1')


@section('titulo','Crear Categoría')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Categorías</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')
		<footer class="footer">
			<div class="footer_content">
				<div class="col-lg-4 footer_col">
					<div class="footer_contact">
						<div class="footer_title">Mantente en contacto</div>
						<div class="newsletter">
						<form action="{{ route('messages') }}" id="newsletter_form" class="newsletter_form" method="POST">
							@csrf
							
							<input type="text" class="newsletter_input" placeholder="Nombre" required="required">
							<br><br>
							<input type="text" class="newsletter_input" placeholder="Apellido">
							<br><br>
							<input type="email" class="newsletter_input" placeholder="Email" required="required">
							<br><br>
							<textarea class="newsletter_input" placeholder="Descripción de la duda"></textarea>
							<button type="submit" >PRUEBA</button>
							

						</form>
						</div>
					</div>
				</div>
			</div>
		</footer>
@endsection