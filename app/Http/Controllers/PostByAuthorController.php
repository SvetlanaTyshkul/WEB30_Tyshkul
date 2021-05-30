<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostByAuthorController extends Controller
{
    public function __invoke($key)
    {
        $author = Author::where('key', '=', $key)->first();

        return view('posts_by_author', ['author' =>$author]);
    }
}
