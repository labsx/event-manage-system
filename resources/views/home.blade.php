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

                        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                            <div class="flex justify-center">
                                <a href="/participant">Register to event</a>
                                <h2 class="text-center">List of events</h2>
                                <nav class="navbar navbar-light bg-light">
                                    <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                    </form>
                                </nav>
                            </div>
                            <div class="mt-16">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                                    @foreach ($posts as $post)
                                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                            <div>
                                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                                    <img src="{{ asset('storage/' . $post->picture) }}" style="height:50px"/>
                                                </div>
                                                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{$post->name}}</h2>
                                                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                                            {{ $post->venue }}
                                                        </p>
                                            </div>
                                        </div>
                                    @endforeach
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
