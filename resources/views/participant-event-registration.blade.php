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

                        <div>
                            <a href="/participant">Back</a>
                        </div>
                        <div>
                            <h3 class="text-center mb-3">Event Registered</h3>
                        </div>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Event Registered</th>
                                    <th scope="col">Manage</th>
                                </tr>
                            </thead>
                                    <tbody>
                                        @unless ($posts->isEmpty())
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{$post->name}}</td>
                                                <td>{{$post->event}}</td>
                                                <td>
                                                    <form action="/participant/{{$post->id}}" method="POST" class="mt-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mt-0" >Cancel</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <td>
                                                    <p>No event register!.</p>
                                                </td>
                                            </tr>
                                        @endunless
                                    </tbody>           
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
