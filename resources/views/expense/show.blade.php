@extends('layouts.app')

@section('content')

<h1>Edit Expense</h1>


{!! Form::open(['action' => ['ExpensesController@update', $exp->id ], 'method' => 'POST'])!!}

<div class="form-group">
        
        {{Form::select('expenseid',array_pluck($cats, 'name', 'id'), $exp->expenseid ,['class' => 'form-control', 'placeholder' => 'Display Name'])}}

    </div>
    <div class="form-group">
           
            {{Form::number('amount',$exp->amount,['class' => 'form-control', 'placeholder' => 'Amount'])}}
    
        </div>
    <div class="form-group">
           
            {{Form::date('entrydate',$exp->entrydate,['class' => 'form-control', 'placeholder' => 'Entry Date'])}}
    
        </div>

        <a href="/expenses" class="btn btn-success">Go Back</a>

        {{Form::hidden('_method','PUT')}}

        {{Form::submit('Save',['class' => 'btn btn-primary'])}}

{!! Form::close()!!}

<p>

</p>

{!!Form::open(['action' => ['ExpensesController@destroy', $exp->id], 'method' => 'POST'])!!}

    {{Form::hidden('_method','DELETE')}}

    {{Form::submit('Delete',['class' => 'btn btn-danger'])}}

{!! Form::close()!!}



@endsection