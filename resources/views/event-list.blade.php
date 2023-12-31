@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <div id="wrapper">
                        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                               
                            <x-nav-link/>
                           
                        </ul>
                        
                           <div id="content-wrapper" class="d-flex flex-column mt-4">
                            <div id="content">
                                <nav class=" mb-4">
                                  <div>
                                  </div>
                                 <div class="row">
                                    <table class="table table-bordered ml-3 mr-3">
                                        <thead>
                                          <tr>
                                            <th scope="col">Picture</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Venue</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Manage</th>
                                          </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($posts as $post)
                                                    <tr>
                                                        <td><img src="{{ asset('storage/' . $post->picture) }}" style="height:50px"/></td>
                                                        <td>{{ $post->name }}</td>
                                                        <td>{{ $post->venue }}</td>
                                                        <td>{{ $post->description }} </td>
                                                        <td>{{ $post->date}} </td>
                                                        <td> <a class="btn btn-primary btn-sm mt-0" 
                                                            href="/event/{{$post->id}}" role="button">Edit</a>
                                                            <form action="/event/{{$post->id}}" method="POST" class="mt-1">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm mt-0" >Delete</button>
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
