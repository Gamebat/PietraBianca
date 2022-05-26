@extends('layouts.main')

@section('title-block')Работы@endsection

@section('content')

<main>
    <div class="catalog">

        @foreach ($data as $el)
            <div class="content-block">
                <img src="{{ $el->path }}" alt="">
                <div class="content-text">
                    <p> {{ $el->name }} </p>
                    <p> {{ $el->type }} </p>
                    <p> {{ $el->material }} </p>
                    @if($el->details != "")
                    <p> {{ $el->details }} </p>
                    @endif
                </div>
                
            </div>
        @endforeach
        
    </div>

    <div class="pages">
        {{ $data->links() }}
    </div>
</main>
    
@endsection