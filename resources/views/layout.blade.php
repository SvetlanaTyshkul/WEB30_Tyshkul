<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav  class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #1a6bbb">
    <div class="container" >
        <a class="navbar-brand" href="{{route('index')}}" style="color:white">WEB-30 PROJECT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('index')}}" style="color:white">Домой
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}" style="color:white">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('services')}}" style="color:white">Наши сервисы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}" style="color:white">Наши контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: yellow"
                       href="{{route('login')}}">@if(\Illuminate\Support\Facades\Auth::check()){{\Illuminate\Support\Facades\Auth::user()->name}}
                        @else Вход @endif</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

@yield('content')

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Категории</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @inject('categories', '\App\Category')
                                @foreach($categories->show_categories() as $category)
                                <li>
                                    <a href="{{route('post_by_category', $category->key)}}">{{$category->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card my-4">
                @inject('authors', '\App\Author')
                <h5 class="card-header">Лучшие авторы из {{$authors->show_count()}}</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">

                                @foreach($authors->show_authors() as $author)
                                    <li>
                                        <a href="{{route('post_by_author', $author->key)}}">{{$author->name}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Мы в социальных сетях</h5>
                <div class="card-body">

                    <a  class="nav-link" href="https://www.facebook.com/">
                        <img src="https://pngicon.ru/file/uploads/FaceBook_512x512-256x256.png" style="width: 25px; height:25px"> Facebook </a>
                    <a class="nav-link" href="https://www.instagram.com/">
                        <img src="https://img.freepik.com/free-vector/instagram-icon_1057-2227.jpg?size=338&ext=jpg" style="width: 25px; height:25px"> Instagram</a>
                    <a class="nav-link" href="https://www.linkedin.com/">
                        <img src="https://img.icons8.com/ios/452/linkedin.png" style="width: 25px; height:25px"> LinkedIn</a>
                    <a class="nav-link" href="https://www.youtube.com/">
                        <img src="https://pngicon.ru/file/uploads/youtube-1.png" style="width: 25px; height:25px"> YouTube</a>

                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Тышкул 2021</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
