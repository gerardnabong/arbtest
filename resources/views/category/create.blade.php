@extends('layouts.app')

@section('content')

<h1>New Category</h1>


{!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST'])!!}

    <div class="form-group">
        
        {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Display Name'])}}

    </div>

    <div class="form-group">
           
            {{Form::text('description','',['class' => 'form-control', 'placeholder' => 'Description'])}}
    
        </div>
        <a href="/categories" class="btn btn-success">Go Back</a>
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
{!! Form::close()!!}

@endsection