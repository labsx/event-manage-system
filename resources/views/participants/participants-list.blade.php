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
                            
                            <x-nav-link/>
                              
                           </ul>
                           
                        
                           <div id="content-wrapper" class="d-flex flex-column mt-4">
                                <div class="flex justify-center mb-3 ">
                                    <form class="form-inline" action="/participant/list" method="GET">
                                    <input class="form-control mr-sm-2 " type="text" name="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </div>
                            <div id="content">
                                <nav class=" mb-4">

                    
                                 <div class="row">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>                       
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Manage</th>
                                          </tr>
                                        </thead>
                                            <tbody>
                                                @unless($posts->isEmpty())
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
                                                @else
                                                    <div class="text-danger">
                                                        <p>No data found!.</p>
                                                    </div>
                                                @endunless
                                            </tbody>
                                         </table>
                            </div class="mt-4"> 
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
