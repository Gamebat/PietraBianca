@extends('layouts.main')

@section('title-block')Заказы@endsection

@section('content')

<main>
    <div class="orders">

            <div class="order-block">

                @foreach ($appli as $el)
                <div class="order-padding">
                    <div class="order">

                        <div class="date">{{ $el->created_at }}</div>
                        <span class="status-wait">В ожидании</span>

                        <p>№ Заказа: {{ $el->id }}</p>
                        <p>Имя: {{ $el->name }}</p>
                        <p>Телефон: {{ $el->number }}</p>
                        <p>Комментарий: {{ $el->comment }}</p>

                        <a href="{{ route('order-accept', $el->id) }}"><button class="accept">Принять</button></a>
                        <a href="{{ route('order-decline', $el->id) }}"><button class="decline">Отклонить</button></a>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="order-block">

                @foreach ($accept as $el)
                <div class="order-padding">
                    <div class="order">

                        <div class="date">{{ $el->created_at }}</div>
                        <span class="status-accept">Принят</span>

                        <p>№ Заказа: {{ $el->id }}</p>
                        <p>Имя: {{ $el->name }}</p>
                        <p>Телефон: {{ $el->number }}</p>
                        <p>Комментарий: {{ $el->comment }}</p>
                        <p>Адрес: {{ $el->address }}</p>
                        <p>Материал: {{ $el->material }}</p>
                        <p>Детали заказа: {{ $el->details }}</p>

                        <a href="{{ route('order-complete', $el->id) }}"><button class="accept">Завершить</button></a>
                    </div>
                </div>
                @endforeach
                
            </div>

            <div class="order-block">

                @foreach ($complete as $el)
                <div class="order-padding">
                    <div class="order">

                        <div class="date">{{ $el->created_at }}</div>
                        <span class="status-complete">Исполнен</span>

                        <p>№ Заказа: {{ $el->id }}</p>
                        <p>Имя: {{ $el->name }}</p>
                        <p>Телефон: {{ $el->number }}</p>
                        <p>Комментарий: {{ $el->comment }}</p>
                        <p>Адрес: {{ $el->address }}</p>
                        <p>Материал: {{ $el->material }}</p>
                        <p>Детали заказа: {{ $el->details }}</p>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="order-block">

                @foreach ($refuse as $el)
                <div class="order-padding">
                    <div class="order">

                        <div class="date">{{ $el->created_at }}</div>
                        <span class="status-refuse">Отклонен</span>

                        <p>№ Заказа: {{ $el->id }}</p>
                        <p>Имя: {{ $el->name }}</p>
                        <p>Телефон: {{ $el->number }}</p>
                        <p>Комментарий: {{ $el->comment }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        
        
    </div>

    <div class="pages">
        {{-- {{ $data->links() }} --}}
    </div>
</main>

@endsection


