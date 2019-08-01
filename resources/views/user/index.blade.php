@extends('layouts.app')

@section('content')


    <h1>Users</h1>
    @if(count($users) > 0)
       

        <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Created at</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                  
                  <tr>
                        
                        <td>{{$user->user}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="/users/{{$user->id}}">Edit</a></td>
                      </tr>
                  @endforeach

                  
                    
                  </tbody>
                </table>
              </div>


    @else
        <p>No Categories Found</p>
    @endif
<a href="/users/create" class="btn btn-success">Add User</a>
@endsection