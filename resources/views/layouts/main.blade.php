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
    @include('inc.header')
    @include('inc.nav')

    @yield('content')
</body>


<script>

    function readerLoad() {
        
        let myMap = document.getElementById('image').files;
       
        for(let fi of myMap){

            console.log(i);
            document.getElementById("imagesload").innerHTML="";
            var file = fi;
            var reader  = new FileReader();
            // it's onload event and you forgot (parameters)
            reader.onload = function(e)  {
                var image = document.createElement("img");
                // the result image data
                image.src = e.target.result;
                document.getElementById("imagesload").appendChild(image);
            }
            // you have to declare the file loading
            reader.readAsDataURL(file);
        }
    }

    function starfill(){
        let number = Number(document.getElementById("starnumber").value);
        console.log('я - ',number);
        for (i = 1; i < number+1; i++){
        document.getElementById("fill"+i).className='lockfill';
        }
    }

    function takeradio(){
        const fruits = document.querySelectorAll('input[name="radio1"]')
            for (const f of fruits) {
                if (f.checked) {
                    console.log('Выбранная звезда: ',f.value);
                    document.getElementById("stars").value = f.value;
                }
            }
    }

    function fun1(){
       
        
        var filesname='';

        if (document.getElementById("image").value !=""){
            var fileInput = document.getElementById("image");   
            var f = fileInput.files[0].name;
            for (i = 0; i < fileInput.files.length; i++) {
                console.log('Файл ',fileInput.files[i].name);
                filesname+= String(fileInput.files[i].name) + " ";
            }
            
            document.getElementById("namef").value = filesname;

            // ЭТО ДЛЯ ВЫВОДА ИЗ БД

            // var splits = filesname.split(' ');
            // splits.splice(-1,1);
            // console.log('массив', splits);

            // console.log('fruit',filesname)
        } 
    }

    function fun2(number){

        for (i = 1; i < number+1; i++){
        document.getElementById("labelrad" + i).classList.add('starfill');
        }

        for (i = number+1; i < 6; i++){
        document.getElementById("labelrad" + i).classList.remove('lockfill');
        }
    }

    function unfill(){
        for (i = 1; i < 6; i++){
        document.getElementById("labelrad" + i).classList.remove('starfill');
        }
    }

    function lockfill(number){
        for (i = 1; i < number+1; i++){
        document.getElementById("labelrad" + i).classList.add('lockfill');
        }

        for (i = 1; i < 6; i++){
        document.getElementById("labelrad" + i).classList.remove('starfill');
        }

    }



    
    // document.addEventListener("DOMContentLoaded", starfill());

</script>
</html>