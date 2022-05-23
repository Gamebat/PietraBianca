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
    <h1>Вход</h1>
    <form  class="myForm" action="{{ route('user.login') }}" method="post" enctype="multipart/form-data">
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

        <label class="lname" for="name">E-mail</label>
        <input class="inputname" type="text" name="email" id="email" placeholder="Введите E-mail">
        {{-- @error('email')
        <div class="alert">
            {{ $message }}
        </div>
        @enderror --}}

        <label class="lname" for="name">Пароль</label>
        <input class="inputname" type="text" name="password" id="password" placeholder="Введите пароль">
        {{-- @error('password')
        <div class="alert">
            {{ $message }}
        </div>
        @enderror --}}

        <button class="submit" type="submit" class="btn btn-success">Отправить</button>

    </form>
</body>
