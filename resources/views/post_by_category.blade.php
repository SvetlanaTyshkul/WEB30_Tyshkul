@extends('layout')

@section('title', $category->title)

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Все посты категории
            <small style="color:#671dea">{{$category->title}}</small>
        </h1>

    @foreach($category->post as $post)
        <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{$post->title}}</h2>
                    <p class="card-text"> {{mb_substr($post->body, 0, 200)}}...</p>
                    <a href="{{route('single_post', $post->id)}}" class="btn btn-primary">Читать далее... &rarr;</a>
                    <div class="card-footer text-muted">
                        Опубликован {{date('d F Y в G:i', strtotime($post->created_at))}} автором
                        <a href="{{route('post_by_author', $post->author->key)}}">{{$post->author->name}}</a>
                    </div>
                    <div class="card-footer text-muted">
                        Категории:
                        @foreach($post->category as $cat)
                            <a style="white-space:pre" href="{{route('post_by_category', $cat->key)}}">  {{$cat->title}}  </a>
                        @endforeach
                    </div>
                </div>
            </div>
    @endforeach
    <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>
@endsection

@section('side_bar')
    @include('side_bar')
@endsection
