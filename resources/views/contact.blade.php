@extends('layout')

@section('title', 'CONTACTS')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Наши контакты:<br><br>
        </h1>
        <ul>
            @foreach($contacts as $contact)
            <li>{{$contact->title}}: {{$contact->value}}</li>
            @endforeach
        </ul>


    </div>
@endsection
