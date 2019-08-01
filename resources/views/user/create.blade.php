@extends('layouts.app')

@section('content')

<h1>New User</h1>

{!! Form::open(['action' => 'UsersController@store', 'method' => 'POST'])!!}

    <div class="form-group">
        
        {{Form::select('roleid',array_pluck($role, 'name', 'id'),'',['class' => 'form-control', 'placeholder' => 'Select Role'])}}

    </div>
    <div class="form-group">
           
            {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
    
        </div>
    <div class="form-group">
           
            {{Form::email('email','',['class' => 'form-control', 'placeholder' => 'Email'])}}
    
        </div>
        <a href="/users" class="btn btn-success">Go Back</a>
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
{!! Form::close()!!}

@endsection