@extends('layouts.app')

@section('content')

<h1>Edit Role</h1>


{!! Form::open(['action' => ['RolesController@update', $role->id ], 'method' => 'POST'])!!}

    <div class="form-group">
        
        {{Form::text('name', $role->name,['class' => 'form-control', 'placeholder' => 'Display Name'])}}

    </div>

    <div class="form-group">
           
            {{Form::text('description',$role->description,['class' => 'form-control', 'placeholder' => 'Description'])}}
    
        </div>
        <a href="/roles" class="btn btn-success">Go Back</a>

        {{Form::hidden('_method','PUT')}}

        @if($role->id > 1)

            {{Form::submit('Save',['class' => 'btn btn-primary'])}}

        
        @endif

{!! Form::close()!!}

<p>

</p>

@if($role->id > 1)

{!!Form::open(['action' => ['RolesController@destroy', $role->id], 'method' => 'POST'])!!}

    {{Form::hidden('_method','DELETE')}}

    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}

{!! Form::close()!!}

@endif




@endsection