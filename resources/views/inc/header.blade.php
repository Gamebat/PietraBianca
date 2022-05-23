@section('header')
<header>

    
    <div class="adminP">
        <ul>
            @if(Auth::user('admin@artishok.ru'))
            <li><a href="orders">Заказы</a></li>
            <li><a href="logout">Выйти</a></li>
            @endif
            @guest
            <li><a href="login">Войти</a></li>
            @endguest

            
        </ul>

    </div>
    

    <div class="logo">
        <img src="../public/image/Pietra_bianca.png" alt="">
    </div>
    
    <div class="header-text">
        <h1>Изготовление эксклюзивных отделочных материалов, предметов интерьера, 
            архитектурных элементов и декоративных изделий из лучшего натурального камня (столы, фонтаны, ванны, плитка и многое другое)            
        </h1>
    </div>
</header>