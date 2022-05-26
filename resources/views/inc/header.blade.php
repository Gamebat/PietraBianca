@section('header')
<header>

    
    <div class="adminP">
        
        <ul>
            @if((Auth::check()))
                @if(Auth::user()->email === 'admin@artishok.ru')
                <li><a href="orders">Заказы</a></li>
                <li><a href="orders">Изменить каталог</a></li>
                @endif
                <li><a href="logout">Выйти</a></li>
            @endif
            @guest
            <li><a href="registration">Регистрация</a></li>
            <li><a href="login">Войти</a></li>
            @endguest

            
        </ul>

    </div>
    

    <div class="logo">
        <img src="../public/image/Pietra_bianca.png" alt="">
    </div>
    
    <div class="header-text">
        <h1>Изготовление эксклюзивных отделочных материалов из камня, предметов интерьера, 
            архитектурных элементов и многое другое          
        </h1>
    </div>
</header>