@extends('layout')

@section('title', 'SOCNETWORKS')

@section('content')
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Мы в социальных сетях</h5>
        <div class="card-body">
            <ul>
                @foreach($socnetworks as $socnetwork)
                    <li>{{$socnetwork->title}}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
