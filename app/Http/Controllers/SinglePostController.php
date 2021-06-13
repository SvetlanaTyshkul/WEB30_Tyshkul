<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class SinglePostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $comments = Comment::where('post_id', '=', $id)->get();
        $post->view = $post->view +1;
        $post->save();
        $log = new Logger ('new');
        $log->pushHandler(new StreamHandler(__DIR__ .'/../../Logs/single_posts_log.log', Logger::WARNING));
        $log->warning('Пользователь ' . Auth::user()->name . ' зашел на страницу с постом №' . $id);

        return view('single_post', ['post' => $post, 'comments'=>$comments]);
    }
}
