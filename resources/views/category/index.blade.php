@extends('layouts.app')

@section('content')


    <h1>Expense Categories</h1>
    @if(count($cats) > 0)
       

        <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Display Name</th>
                      <th>Description</th>
                      <th>Created At</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($cats as $cat)
                  
                  <tr>
                        
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->description}}</td>
                        <td>{{$cat->created_at}}</td>
                        <td><a href="/categories/{{$cat->id}}">Edit</a></td>
                      </tr>
                  @endforeach

                  
                    
                  </tbody>
                </table>
              </div>


    @else
        <p>No Categories Found</p>
    @endif
<a href="/categories/create" class="btn btn-success">Add Category</a>
@endsection