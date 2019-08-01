@extends('layouts.app')

@section('content')


    <h1>Expenses</h1>
    @if(count($exps) > 0)
       

        <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Expense Category</th>
                      <th>Amount</th>
                      <th>Entry Date</th>
                      <th>Created at</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($exps as $exp)
                  
                  <tr>
                        
                        <td>{{$exp->name}}</td>
                        <td>{{$exp->amount}}</td>
                        <td>{{$exp->entrydate}}</td>
                        <td>{{$exp->created_at}}</td>
                        <td><a href="/expenses/{{$exp->id}}">Edit</a></td>
                      </tr>
                  @endforeach

                  
                    
                  </tbody>
                </table>
              </div>


    @else
        <p>No Categories Found</p>
    @endif
<a href="/expenses/create" class="btn btn-success">Add Expense</a>
@endsection