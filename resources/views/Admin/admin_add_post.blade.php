@extends('layout')

@section('title', 'Добавить пост')

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Добавить пост:</h1>

        <!-- Blog Post -->
        @if (Auth::check())
            <hr>
            <form action="add_post" method="post" enctype="multipart/form-data">
                @csrf
                <p>Выберите автора:</p>
                <select class="mbd-select md-form" name="author_id">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
                <hr>
                <p>Выберите категорию:</p>

                    @foreach($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" name="category_id" type="checkbox" value="{{$category->id}}" >
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$category->title}}
                            </label>
                        </div>
                    @endforeach
                <hr>
                <input type="text" placeholder="Title" name="title"><br>
                <textarea class="form-control" name="body"></textarea><br>
                <input type="file" name="image"><hr>
                <button class="btn-save btn btn-primary btn-cm">Добавить пост</button>
            </form>
        @endif
    </div>
@endsection


