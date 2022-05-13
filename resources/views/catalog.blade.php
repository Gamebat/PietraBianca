@extends('layouts.main')

@section('title-block')Каталог@endsection

@section('content')

<main>
    <div class="catalog">

        @for ($i = 0; $i < 10; $i++)
            <div class="content-block">
                пиздец
            </div>
        @endfor

    </div>
</main>

@endsection