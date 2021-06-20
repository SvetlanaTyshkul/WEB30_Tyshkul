<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class AdminPostsController extends Controller
{
   public function add()
   {
       $authors = Author::all();
       $categories = Category::all();

       return view('Admin.admin_add_post',
           [
           'authors' => $authors,
           'categories' => $categories
       ]
       );
   }

   public function save (Request $request)
   {
       if (Auth::check()){
           if ($request->method() == 'POST'){
               $this->validate($request, [
                   'author_id' => 'required | numeric',
                   'title' => 'string | required | max:100 | min:5',
                   'body' => 'required | min:20',
                   'image' => 'image',
               ]
               );

               $post = new Post();
               $post ->author_id = $request->input('author_id');
               $post ->title = $request->input('title');
               $post ->body = $request->input('body');

               $image = $request->image;
               if ($image){
                   $imageName = $image->getClientOriginalName();
                   $image->move('images', $imageName);
                   $post->image = 'http://project/images/' . $imageName;
               }
               $post->save();

               $post->category()->sync($request->input('category_id'), false);
               $post->category()->getRelated();

               $log = new Logger ('new');
               $log->pushHandler(new StreamHandler(__DIR__ .'/../../Logs/new_posts_log.log', Logger::INFO));
               $log->info('Пользователь ' . Auth::user()->name . ' добавил пост № ' . $post->id);

               $logger = new \Katzgrau\KLogger\Logger(__DIR__. '/../../Logs');
               $logger->info('Katzgrau: Пользователь ' . Auth::user()->name . ' добавил пост № ' . $post->id);

               \Session::flash('flash', 'Пост № ' . $post->id . ' успешно добавлен.');


               return redirect()->route('single_post', $post->id);
           }
       }else {
           return redirect()->route('index');
       }
   }

   public function edit($id)
   {
       if (Auth::check()){
           $post = Post::where('id', '=', $id)->first();
           $authors = Author::all();
           $categories = Category::all();

           return view('Admin.edit_post', [
               'post'=> $post,
               'authors'=> $authors,
               'categories' =>$categories
           ]);
       }else{
           return redirect('404');
       }
   }

   public function edit_save(Request $request)
   {
       if (Auth::check()){
       if ($request->method() == 'POST'){
           $this->validate($request, [
                   'author_id' => 'required | numeric',
                   'title' => 'string | required | max:100 | min:5',
                   'body' => 'required | min:20',
                   'image' => 'image',
               ]
           );
           $post = Post::where('id', '=', $request->input('id'))->first();
           $post ->author_id = $request->input('author_id');
           $post ->title = $request->input('title');
           $post ->body = $request->input('body');

           $image = $request->image;
           if ($image){
               $imageName = $image->getClientOriginalName();
               $image->move('images', $imageName);
               $post->image = 'http://project/images/' . $imageName;
           }
           $post->save();

           $post->category()->getRelated();
           $post->category()->sync($request->input('category_id'));
           $post->category()->getRelated();

           \Session::flash('flash', 'Пост № ' . $post->id . ' успешно отредактирован и сохранен.');

           $log = new Logger('new');
           $log->pushHandler(new StreamHandler(__DIR__ . '/../../Logs/edit_posts_log.log', Logger::WARNING));
           $log->warning('Пользователь ' . Auth::user()->name . ' отредактировал пост с заглавием ' . $post->title);

           $logger = new \Katzgrau\KLogger\Logger(__DIR__. '/../../Logs');
           $logger->warning('Katzgrau: Пользователь ' . Auth::user()->name . ' отредактировал пост с заглавием ' . $post->title);

           return redirect()->route('admin_post_get');
       }
   }else {
    return redirect()->route('404');
}
   }

   public function delete(Request $request){
       if (Auth::check()){
       if ($request->method()=='DELETE'){
           $post = Post::find($request->input('id'));
           $post->delete();

           $log = new Logger('new');
           $log->pushHandler(new StreamHandler(__DIR__ . '/../../Logs/del_posts_log.log', Logger::WARNING));
           $log->warning('Пользователь ' . Auth::user()->name . ' удалил пост №' . $post->id);

           $logger = new \Katzgrau\KLogger\Logger(__DIR__. '/../../Logs');
           $logger->warning('Katzgrau: Пользователь ' . Auth::user()->name . ' удалил пост №' . $post->id);

           return back();
       }else{
         return view('Admin.admin_post', ['posts'=>Post::orderBy('updated_at', 'DESC')->paginate(10)]);
       }
   }else{
        return redirect()->route('404');
        }
    }
}
