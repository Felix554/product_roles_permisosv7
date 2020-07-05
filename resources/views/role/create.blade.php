@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Role</h2></div>

                <div class="card-body">
                @include('custom.message')


                    <form action="{{ route('role.store')}}" method="POST">
                        @csrf
                        <div class="container">
                            <h3>Required Data</h3>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name')}}" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug')}}" placeholder="Slug">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3">{{ old('description')}}</textarea>
                        </div>

                        

                        <hr>

                        <h3>Full Access</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessyes" name="full-access" value="yes" class="custom-control-input"
                                @if(old('full-access') == 'yes')
                                    checked 
                                @endif
                            >
                            <label class="custom-control-label" for="fullaccessyes">Si</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessno" name="full-access" value="no" class="custom-control-input"
                            @if(old('full-access') == 'no')
                                    checked 
                            @endif
                            @if(old('full-access') === null)
                                    checked 
                            @endif
                            >
                            <label class="custom-control-label" for="fullaccessno">No</label>
                        </div>

                        <hr>

                        <h3>Permission List</h3>

                        @foreach($permissions as $permission)

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" 
                                id="permission_{{$permission->id}}"
                                value="{{$permission->id}}"
                                name="permission[]"
                                    @if(is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                        checked 
                                    @endif
                                >
                                <label class="custom-control-label" for="permission_{{$permission->id}}">
                                    {{ $permission->id}}
                                    -
                                    {{ $permission->name}}
                                    <em>({{ $permission->description}})</em>
                                </label>
                            </div>

                        @endforeach

                        <hr>

                        <input type="submit" class="btn btn-primary" value="Save">
                        

                    </form>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
