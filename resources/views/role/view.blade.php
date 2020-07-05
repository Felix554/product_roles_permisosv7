@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Role</h2></div>

                <div class="card-body">
                @include('custom.message')


                    <form action="{{ route('role.update', $role->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="container">
                            <h3>Required Data</h3>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $role->name)}}" placeholder="Name" readonly>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $role->slug)}}" placeholder="Slug" readonly>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3" readonly>{{ old('description', $role->description)}}</textarea>
                        </div>

                        

                        <hr>

                        <h3>Full Access</h3>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input disabled type="radio" id="fullaccessyes" name="full-access" value="yes" class="custom-control-input"
                                @if($role['full-access'] == 'yes')
                                    checked 
                                @elseif(old('full-access') == 'yes')
                                    checked 
                                @endif
                            >
                            <label class="custom-control-label" for="fullaccessyes">Si</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input disabled type="radio" id="fullaccessno" name="full-access" value="no" class="custom-control-input"
                            @if($role['full-access'] == 'no')
                                    checked 
                            @elseif(old('full-access') == 'no')
                                checked 
                            @endif
                            >
                            <label class="custom-control-label" for="fullaccessno">No</label>
                        </div>

                        <hr>

                        <h3>Permission List</h3>

                        @foreach($permissions as $permission)

                            <div class="custom-control custom-checkbox">
                                <input disabled type="checkbox" class="custom-control-input" 
                                id="permission_{{$permission->id}}"
                                value="{{$permission->id}}"
                                name="permission[]"
                                    @if(is_array(old('permission')) && in_array("$permission->id", old('permission')))
                                        checked
                                    @elseif(is_array($permission_role) && in_array("$permission->id", $permission_role))
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

                        <a class="btn btn-success" href="{{ route('role.edit',$role->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('role.index')}}">Back</a>
                    
                        

                    </form>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
