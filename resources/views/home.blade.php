@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center mt-2">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                            <div class="flex justify-center">
                                <a href="/participant" class="float-right">Register to event</a>
                                <h2 class="ml-5 mt-5">List of events</h2>

                               <div class="mt-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 ">

                                    @unless ($posts->isEmpty())
                                        @foreach ($posts as $index => $post)
                                            @if (isset($events[$index]))
                                                @php
                                                    $event = $events[$index];
                                                @endphp
                                                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                                        <div>
                                                            <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">                                                          
                                                                    <img src="{{ asset('storage/' . $event->picture) }}" style="height:100px"/>
                                                            </div>

                                                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                                                    {{$post->event}}</h2>
                                                                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                                                         Place: {{ $event->venue }} </p> 
                                                                    </p>

                                                                    <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                                                        Date of Event:  {{\Carbon\Carbon::parse($event->date)->format('d/m/Y') }}
                                                                    </p>
                                                        </div>
                                                    </div>
                                            @endif
                                        @endforeach
                                     @else
                                    <div class="text-danger">
                                        <p>No event data found !.</p>
                                    </div>
                                    @endunless
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
