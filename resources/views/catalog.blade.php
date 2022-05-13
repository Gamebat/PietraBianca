@extends('layouts.main')

@section('title-block')Каталог@endsection

@section('content')

<main>
    <div class="catalog">

        @foreach ($collection as $item)
            
        @endforeach

    </div>
</main>

@endsection