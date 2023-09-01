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
                            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/create/event">
                                <div class="sidebar-brand-icon rotate-n-15">
                                    <i class="fas fa-laugh-wink"></i>
                                </div>
                            </a>

                               <x-nav-link/>
                               
                        </ul>
                        
                                  
                        <div class= "container bg-gray-50 border border-gray-200 rounded p-6 p-10 max-w-lg mx-auto mt-24" >
                                <header class="text-center">
                                    <h2 class="text-2xl font-bold uppercase mb-1 mt-4">ADD USER</h2> 
                                </header>
                                
                                <form action="/add/user" method="POST" class="py-4">
                                    @csrf
                                    <div class="form-group">
                                      <label >Event Name</label>
                                          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Name" value="{{old('name')}}">
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{$message}}</p>
                                            @enderror
                                    </div>
                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="emai" class="form-control" name="email"  aria-describedby="emailHelp" placeholder="Enter email address" value="{{old('email')}}">
                                            @error('venue')
                                                <p class="text-danger text-xs mt-2">{{$message}}</p>
                                            @enderror
                                      </div>
                
                                      <div class="form-group">
                                        <label >Password</label>
                                        <input type="password" class="form-control" name="password"  placeholder="Enter password">
                                            @error('description')
                                                <p class="text-danger text-xs mt-2">{{$message}}</p>
                                            @enderror
                                      </div>

                                      <div class="form-group">
                                        
                                        <input type="number" class="form-control invisible" name="is_admin" value="1">
                                      </div>
                
                                    <button type="submit" class="btn btn-primary mt-10 ">Submit</button>
                                  </form>
                                </div>
                            </div>
                
                            <div class=" ">
                                @if (session()->has('message'))
                                    <div x-data="{show: true}" x-init ="setTimeout(()=> show = false, 3000)"
                                        x-show="show" class="mt-3 d-flex justify-content-center">
                                            <div class="alert alert-success col-2 " role="alert">
                                                {{session('message')}}
                                            </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>    
                     </div> 
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
