@extends('layouts.app')

@section('content')

<h1>New Expense</h1>

{!! Form::open(['action' => 'ExpensesController@store', 'method' => 'POST'])!!}

    <div class="form-group">
        
        {{Form::select('expenseid',array_pluck($cats, 'name', 'id'),'',['class' => 'form-control', 'placeholder' => 'Select Category'])}}

    </div>
    <div class="form-group">
           
            {{Form::number('amount','',['class' => 'form-control', 'placeholder' => 'Amount'])}}
    
        </div>
    <div class="form-group">
           
            {{Form::date('entrydate','',['class' => 'form-control', 'placeholder' => 'Entry Date'])}}
    
        </div>
        <a href="/expenses" class="btn btn-success">Go Back</a>
        {{Form::submit('Save',['class' => 'btn btn-primary'])}}
{!! Form::close()!!}

@endsection