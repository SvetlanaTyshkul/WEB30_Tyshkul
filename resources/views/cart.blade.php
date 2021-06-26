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
            @if(!Cart::isEmpty())
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
                    <th>Удалить</th>
                </tr>
                    @foreach(\Cart::getContent() as $post)
                    <tr>
                         <td>{{$post->id}}</td>
                         <td>
                             <img src="{{$post->attributes->image}}" width="70" height="50">
                         </td>
                         <td>{{$post->name}}</td>
                         <td>{{$post->price}}</td>
                         <td> <input type="number" name="items [{{$post->id}}]"
                             value="{{$post->quantity}}">
                         </td>
                         <td>{{$post->getPriceSum()}}</td>
                         <td>
                            <a href="{{route('delete_from_cart', $post->id)}}" class="btn btn-secondary">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                        <tr>
                            <td colspan="4" style="text-align: right">ИТОГО:</td>
                            <td style="background-color: aquamarine; font-weight: bold">
                                {{\Cart::getTotalQuantity()}}
                            </td>
                            <td style="background-color: aqua; font-weight: bold">
                                {{\Cart::getTotal()}}
                            </td>
                            <td></td>
                        </tr>
            </table>
                <div style="text-align: center">
                    <a href="#" class="btn btn-info"
                       onclick="document.getElementById('checkout').submit()" >Обновить корзину</a>
                </div>
            </form>
            <br>
            <a href="{{route('checkout')}}" class="btn btn-primary">Перейти к оформлению заказа</a>
                @else
                    <h5>Ваша корзина пуста</h5>
                @endif
        </div>
    </div>
@endsection
@section('side_bar')
    @include('side_bar')
@endsection



