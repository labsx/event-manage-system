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
                    <p><a href="/home">Back</a> <a href="/calcel/event" class="ml-2">Event Register</a></p>
       
                     <div class="homepage-info-section mt-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-8 col-lg-7">
                                        <header class="entry-header">
                                            <h2 class="entry-title mb-3">Register</h2>
                                        </header>
                        
                                        <div class="entry-content mt-1">
                                            <form action="/participant" method="POST">
                                                @csrf
                                                @method ('PUT')
                                                <div class="form-group">
                                                    <label class="">Participant Name</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ Auth::user()->name }}" readonly>
                                                        @error('name')
                                                            <p class="text-danger text-xs mt-2">{{$message}}</p>
                                                        @enderror
                                                </div>

                                                <label>Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email}} " readonly>
                                                        @error('email')
                                                            <p class="text-danger text-xs mt-2">{{$message}}</p>
                                                        @enderror
                                                </div>

                                                <label class="mt-2">Event</label>
                                                    <select class="form-control" type="event"  name="event" >
                                                            @foreach ($events as $event)      
                                                                <option value="{{$event->name}}">{{$event->name }}</option>
                                                            @endforeach
                                                    </select>

                                                    <footer class="entry-footer">
                                                        <button type="submit" class="btn gradient-bg mt-4">Register Now</button>
                                                    </footer>
                                                </div>
                                            </form>

                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Registered Event</th>
                                                    <th scope="col">Handle</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($posts as $post)
                                                  <tr>
                                                    <td>{{$post->event}}</td>
                                                    <td>
                                                        <form action="/cancel/{{$post->id}}" method="POST" class="mt-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm mt-0" >Delete</button>
                                                        </form>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                                @endforeach
                                              </table>

                                            <div class=" ">
                                                @if (session()->has('message'))
                                                    <div x-data="{show: true}" x-init ="setTimeout(()=> show = false, 3000)"
                                                        x-show="show" class="mt-3 ">
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
</div>
@endsection
