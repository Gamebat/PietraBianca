@extends('layouts.main')

@section('title-block')Каталог@endsection

@section('content')

<main>
    <div class="catalog">

        @foreach ($data as $el)
            <div class="content-block">
                <img src="{{ $el->path }}" alt="">
                <div class="content-text">
                    <p> {{ $el->name }} </p>
                    <p> от {{ number_format($el->price, 0, '', ' ') }} ₽/м<sup>2</sup> </p>
                    <p> В наличии {{ number_format($el->amount, 2, ',', ' ') }} м<sup>2</sup> </p>
                </div>
                
            </div>
        @endforeach
        
    </div>

    <div class="pages">
        {{ $data->links() }}
    </div>
</main>

@endsection