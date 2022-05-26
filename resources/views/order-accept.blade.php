<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="/PietraBianca/public/css/all.css">
    <script defer src="{{ asset('js/app.js') }}" ></script>
    
    
</head>
<body> 
    <div style="width: 500px; position: relative; height: auto; min-height:250px; padding: 15px; border-radius: 20px; margin-bottom: 30px; margin-top: 100px;" class="tipobody">
    <form  class="myForm" action="{{ route('submit-accept', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2>Добавить в принятые</h2>

        <label class="lname" for="name">Имя</label>
        <input class="inputname" type="name" name="name" value="{{$data->name}}" id="name" placeholder="Введите имя">

        <label class="lname" for="name">Телефон</label>
        <input class="inputname" type="text" name="number" value="{{$data->number}}" id="number" placeholder="Введите имя">

        <label class="lname" for="comment">Комментарий покупателя</label>
        <textarea class="areaclass" type="textarea" name="comment" id="comment">{{$data->comment}}</textarea>

        <label class="lname" for="name">Адресс</label>
        <input class="inputname" type="text" name="address"  id="address" placeholder="Введите имя">

        <label class="lname" for="name">Материал</label>
        <input class="inputname" type="text" name="material"  id="material" placeholder="Укажите материал">

        <label class="lname" for="comment">Детали заказа</label>
        <textarea class="areaclass" type="textarea" name="details" id="details" placeholder="Опишите детали"></textarea>

        <button class="submit" type="submit" class="btn btn-success">Отправить</button>

    </form>
    </div>
</body>