<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header text-center">Курсы валют</h5>
        <div class="card-body">
            <ul class="list-group-flush">
                @inject('currency', '\App\Currency')
                {{$currency->get_currency()}}
            </ul>
        </div>
    </div>
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header text-center">Советуем почитать </h5>
        <div class="card-body text-center">
            @inject('posts', '\App\Post')
            @foreach($posts->getRandomPost() as $post)
                <a href="{{route('single_post', $post->id)}}"> {{$post->title}}</a>
            @endforeach
        </div>
    </div>
    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header text-center">Категории</h5>
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
        <h5 class="card-header text-center">Лучшие авторы из {{$authors->show_count()}}</h5>
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
</div>
