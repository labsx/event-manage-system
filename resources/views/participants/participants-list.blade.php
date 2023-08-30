@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div id="wrapper">
                        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                            <h2 class="text-center">Participants List</h2>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="/event/list" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">
                                        <span>EVENT DATA</span>
                                    </a>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">    
                                </li> 
                
                                 <li class="nav-item">
                                    <a class="nav-link collapsed" href="/admin/home" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">
                                        <span>ADD EVENT</span>
                                    </a>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">    
                                 </li>
                
                                 <li class="nav-item">
                                    <a class="nav-link collapsed" href="/participant/list" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">
                                        <span>PARTICIPANT LIST</span>
                                    </a>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">    
                                 </li>
                           </ul>
                        
                           <div id="content-wrapper" class="d-flex flex-column mt-4">
                            <div id="content">
                                <nav class=" mb-4">
                                  <div>
                                    <nav class="navbar navbar-light bg-light">
                                    <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </nav>
                
                                  </div>
                    
                                 <div class="row">
                                    <table class="table table-bordered ml-3 mr-3">
                                        <thead>
                                          <tr>                       
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Manage</th>
                                          </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($posts as $post)
                                                    <tr>
                                                        <td>{{ $post->name }}</td>
                                                        <td>{{ $post->email }}</td>
                                                        <td>{{ $post->event }}</td>
                                                        <td> 
                                                            <form action="/destroy/{{$post->id}}" method="POST" class="mt-1 mb-0 ">
                                                                @csrf
                                                                @method ('delete')  
                                                                  <button type="submit" class="btn btn-danger btn-sm" role="button">Delete</button>
                                                              </form> 
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                      </table>
                            </div> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
