@extends('layout')

@section('title', "POST")

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if(\Session::has('flash'))
            <h5>{{\Session::get('flash')}}</h5>
        @endif
        <h1 class="my-4">{{$post->title}}</h1>

        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"> {{$post->body}}</p>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$post->updated_at}} by
                    <a href="{{route('post_by_author', $post->author->key)}}">{{$post->author->name}}</a>
                </div>
                <div class="card-footer text-muted">
                    Категории:
                    @foreach($post->category as $cat)
                        <a style="white-space:pre" href="{{route('post_by_category', $cat->key)}}">  {{$cat->title}}  </a>
                    @endforeach
                </div>
                <div class="card-footer text-muted">
                    Просмотры: {{$post->view}}
                </div>
            </div>
        @if (Auth::check())
            <hr>
            @if(count($comments) == 0)<p>Комментариев нет.</p>@endif
            @foreach($comments as $comment)
                Автор: <strong style="color:darkblue;">{{$comment->author}}</strong><br>
                {{$comment->comment}}
                Добавлен: {{$comment->created_at}}
                <hr>
            @endforeach
        @if(Auth::user()->role ==2)
            <form action="save_comment" method="post">
                @csrf
                 <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="hidden" name="author" value="{{Auth::user()->name}}">
                <textarea class="form-control" name="comment"></textarea>
                <br>
                <button class="btn-save btn btn-primary btn-cm">Добавить комментарий</button>
            </form>
            @endif
        @else
        <p>Войдите чтобы иметь возможность видеть комментарии и комментировать</p>
            @endif
    </div>
@endsection

@section('side_bar')
    @include('side_bar')
@endsection

