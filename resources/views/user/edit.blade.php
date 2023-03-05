@extends('plantilla.admin1')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit User</h2></div>

                <div class="card-body">
                @include('custom.message')


                    <form action="{{ route('user.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">
                            <h3>Required Data</h3>
                        

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name)}}" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $user->email)}}" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <select class="form-control"  name="roles" id="roles">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id}}"
                                        @isset($user->roles[0]->name)
                                            @if($user->roles[0]->name == $role->name)
                                                selected
                                            @endif
                                        @endisset
                                    >
                                    {{ $role->name}}
                                    </option>
                                @endforeach
                                
                            </select>
                        </div>

                        <hr>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        

                    </form>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
