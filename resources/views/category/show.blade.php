@extends('layouts.app')

@section('content')

<h1>Edit Category</h1>


{!! Form::open(['action' => ['CategoriesController@update', $cat->id ], 'method' => 'POST'])!!}

    <div class="form-group">
        
        {{Form::text('name', $cat->name,['class' => 'form-control', 'placeholder' => 'Display Name'])}}

    </div>

    <div class="form-group">
           
            {{Form::text('description',$cat->description,['class' => 'form-control', 'placeholder' => 'Description'])}}
    
        </div>
        <a href="/categories" class="btn btn-success">Go Back</a>

        {{Form::hidden('_method','PUT')}}

        {{Form::submit('Save',['class' => 'btn btn-primary'])}}

{!! Form::close()!!}

<p>

</p>

{!!Form::open(['action' => ['CategoriesController@destroy', $cat->id], 'method' => 'POST'])!!}

    {{Form::hidden('_method','DELETE')}}

    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}

{!! Form::close()!!}



@endsection