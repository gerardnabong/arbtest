

@extends('layouts.app')

@section('content')
<h1>Expenses</h1>
@if(count($data) > 0)
<ul class="list-group">
    @foreach ($data as $d)
    <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$d->cat}} -
            {{$d->amount}}
          </li>

     
        

    @endforeach        
        </ul>
@endif

@endsection