@extends('layout')

@section('title', "Корзина")

@section('content')
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if(\Session::has('flash'))
            <h5>{{\Session::get('flash')}}</h5>
        @endif
        <!-- Blog Post -->
        <div class="card mb-4">
            <form id="checkout" method="post" action="{{route('update_cart')}}">
                @csrf
            <table border="1">
                <p>Корзина</p>
                <tr>
                    <th>Id</th>
                    <th>Превью</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Ед</th>
                    <th>Всего</th>
                    <th></th>
                    <th>Удалить</th>
                </tr>
                @if(!Cart::isEmpty())
                    @foreach(\Cart::getContent() as $post)
                    <tr>
                         <td>{{$post->id}}</td>
                         <td>
                             <img src="{{$post->attributes->image}}" width="70" height="50">
                         </td>
                         <td>{{$post->name}}</td>
                         <td>{{$post->price}}</td>
                         <td> <input type="number" name="items [{{$post->id}}]"
                             value="{{$post->quantity}}" </td>
                         <td>{{$post->getPriceSum()}}</td>
                        <td></td>
                        <td>
                            <a href="{{route('delete_from_cart', $post->id)}}" class="btn btn-secondary">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </table>
               <a href="#" class="btn btn-info"
                  onclick="document.getElementById('checkout').submit()" >Обновить корзину</a>
            </form>
        </div>
    </div>

@endsection

@section('side_bar')
    @include('side_bar')
@endsection



