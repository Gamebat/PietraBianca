@extends('layouts.main')

@section('title-block')Отзывы@endsection

@section('content')


<div style="@if (url()->full() == ('http://localhost/PietraBianca/public/feedback') || url()->full() == ('http://localhost/PietraBianca/public/feedback?page=1')) '' @else justify-content: flex-start @endif" class="feedflex">
    

    <div class="feedback">
        <h2>Отзывы о компании</h2>
        @foreach ($data as $el)
            <div class="feedback-block">

                <div class="feedback-text">

                    <div class="stars">
                        <div id="fill1" class="@if (($el->rating) > 0) lockfill2 @else starempty @endif"></div>
                        <div id="fill2" class="@if (($el->rating) > 1) lockfill2 @else starempty @endif"></div>
                        <div id="fill3" class="@if (($el->rating) > 2) lockfill2 @else starempty @endif"></div>
                        <div id="fill4" class="@if (($el->rating) > 3) lockfill2 @else starempty @endif"></div>
                        <div id="fill5" class="@if (($el->rating) > 4) lockfill2 @else starempty @endif"></div>

                        <p> {{ $el->user }} </p>
                    </div>
                   
                    <p class="comment"> {{ $el->comment }}</p>
                </div>

                @php
                $arr = $el->path_image;
                $explode = explode(';',$arr);
                @endphp
                
                <div class="img-block">
                    @foreach ($explode as $ex )
                    <img class="feedimage" src="{{ asset('/storage/' . $ex) }}" alt="">
                    @endforeach
                </div>
                
            </div>
        @endforeach

        
    </div>

    @if (url()->full() == ('http://localhost/PietraBianca/public/feedback') || url()->full() == ('http://localhost/PietraBianca/public/feedback?page=1'))

    <form  class="myForm" action="{{ route('image-upload') }}" method="post" enctype="multipart/form-data">
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

        <h2>Оставить отзыв</h2>
    
        <div class="buttons">
            
            <div class="form_radio_btn">
                <input class="radio" id="radio1" name="radio1" type="radio" value="1" onchange="lockfill(1), takeradio()" />
                <label for="radio1" id="labelrad1" class="stringR" onmouseout="unfill()" onmouseover="fun2(1)">
                </label>
            </div>

            <div class="form_radio_btn">
                <input class="radio" id="radio2" name="radio1" type="radio" value="2" onchange="lockfill(2), takeradio()" />
                <label for="radio2" id="labelrad2" class="stringR" onmouseout="unfill()" onmouseover="fun2(2)">
                </label>
            </div>

            <div class="form_radio_btn">
                <input class="radio" id="radio3" name="radio1" type="radio" value="3" onchange="lockfill(3), takeradio()" />
                <label for="radio3" id="labelrad3" class="stringR" onmouseout="unfill()" onmouseover="fun2(3)">
                </label>
            </div>

            <div class="form_radio_btn">
                <input class="radio" id="radio4" name="radio1" type="radio" value="4" onchange="lockfill(4), takeradio()" />
                <label for="radio4" id="labelrad4" class="stringR" onmouseout="unfill()" onmouseover="fun2(4)">
                </label>
            </div>

            <div class="form_radio_btn">
                <input class="radio" id="radio5" name="radio1" type="radio" value="5" onchange="lockfill(5), takeradio()" />
                <label for="radio5" id="labelrad5" class="stringR" onmouseout="unfill()" onmouseover="fun2(5)">
                </label>
            </div>

        </div>

        <label class="lname" for="name">Имя</label>
        <input class="inputname" type="name" name="name" id="name" placeholder="Введите имя">
        <div class="cut"></div>

        
        <label class="lname" for="comment">Комментарий</label>
        <textarea class="areaclass" type="textarea" name="comment" id="comment" placeholder="Напишите комментарий"></textarea>

        <label class="lfile" for="image">Выберите файлы</label>
        <input class="input-file" type="file" name="image[]" id="image" multiple=""
        accept=".jpg, .jpeg, .png"
        onchange="fun1(), readerLoad()">

        <div id="imagesload" class="imagesload">

        </div>

        <button class="submit" type="submit" class="btn btn-success">Отправить</button>

        <input value="" type="hidden" name="namef" id="namef">
        <input value="" type="hidden" name="stars" id="stars">
    </form>
    
    @else
        <a href="./feedback" class="otzivbutton">Оставить отзыв</a>
    
    @endif


</div>
<div class="pages">
    {{ $data->links() }}
</div>
@endsection