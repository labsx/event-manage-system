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
                   
                   //
            </div>
        </div>
    </div>
</div>
@endsection
