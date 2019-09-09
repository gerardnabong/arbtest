@extends('layouts.app')

@section('content')

<h1>Edit User</h1>

<example-component></example-component>


{!! Form::open(['action' => ['UsersController@update', $user->id ], 'method' => 'POST'])!!}

<div class="form-group">
        
        {{Form::select('roleid',array_pluck($role, 'name', 'id'), $user->roleid ,['class' => 'form-control', 'placeholder' => 'Display Name'])}}

    </div>
    <div class="form-group">
           
            {{Form::text('name',$user->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
    
        </div>
    <div class="form-group">
           
            {{Form::email('email',$user->email,['class' => 'form-control', 'placeholder' => 'Email'])}}
    
        </div>

        <a href="/users" class="btn btn-success">Go Back</a>

        {{Form::hidden('_method','PUT')}}

        {{Form::submit('Save',['class' => 'btn btn-primary'])}}

{!! Form::close()!!}

<p>

</p>

{!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST'])!!}

    {{Form::hidden('_method','DELETE')}}

    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}

{!! Form::close()!!}



@endsection