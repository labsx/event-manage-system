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
                        <x-nav-link/>
                                  
                        <div class= "container bg-gray-50 border border-gray-200 rounded p-6 p-10 max-w-lg mx-auto mt-24" >
                                <header class="text-center">
                                    <h2 class="text-2xl font-bold uppercase mb-1 mt-4">UPDATE EVENT</h2> 
                                </header>
                                
                                <form action="/event/{{ $post->id }}" method="POST" enctype="multipart/form-data" class="py-3">
                                    @csrf
                                    @method ('PUT')
                
                                    <div class="form-group">
                                      <label >Event Name</label>
                                          <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter event name" value="{{ $post->name }}">
                                            @error('name')
                                                <p class="text-danger text-xs mt-2">{{$message}}</p>
                                            @enderror
                                    </div>
                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Event Venue</label>
                                        <input type="text" class="form-control" name="venue"  aria-describedby="emailHelp" placeholder="Enter event venue" value="{{ $post->venue }}">
                                            @error('venue')
                                                <p class="text-danger text-xs mt-2">{{$message}}</p>
                                            @enderror
                                      </div>
                
                                      <div class="form-group">
                                        <label >Event Description</label>
                                        <input type="text" class="form-control" name="description"  placeholder="Enter event description" value="{{ $post->description }}">
                                            @error('description')
                                                <p class="text-danger text-xs mt-2">{{$message}}</p>
                                            @enderror
                                      </div>
                
                                      <div class="form-group">
                                        <label for="picture">Event Picture</label>
                                        <input type="file" class="form-control" name="picture" aria-describedby="emailHelp" placeholder="Select event picture">
                                        <img src="{{ asset('storage/' . $post->picture) }}" style="height:70px" class="mt-2"/>
                                           
                                      </div>
                
                                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
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
