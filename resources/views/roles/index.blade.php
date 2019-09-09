@extends('layouts.app')

@section('content')


    <h1>Roles</h1>
    @if(count($roles) > 0)
       

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
                  @foreach($roles as $role)
                  
                  <tr>
                        
                        <td>{{$role->name}}</td>
                        <td>{{$role->description}}</td>
                        <td>{{$role->created_at}}</td>
                        <td><a href="/roles/{{$role->id}}">Edit</a></td>
                      </tr>
                  @endforeach

                  
                    
                  </tbody>
                </table>
              </div>


    @else
        <p>No Roles Found</p>
    @endif
<a href="/roles/create" class="btn btn-success">Add Role</a>
@endsection