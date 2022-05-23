@extends('layouts.main')

@section('title-block')Заказы@endsection

@section('content')

<main>
    <div class="orders">

        {{-- @foreach ($data as $el)
            <div class="order-block">
                <img src="{{ $el->path }}" alt="">
                <div class="content-text">
                </div>
                
            </div>

            <div class="order-block">

            </div>

            <div class="order-block">

            </div>
        @endforeach --}}
        
    </div>

    <div class="pages">
        {{-- {{ $data->links() }} --}}
    </div>
</main>

@endsection