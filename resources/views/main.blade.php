<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>SKT menu</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" type="text/css" media="screen">
    <!--<link rel="stylesheet" href="../css/style-print.css" type="text/css" media="print"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

</head>
<body>
    <header>
        <ul>
            
            <li><a href="#">Login</a></li>
        </ul>
    </header>
    <div class="wrapper">
        <img class="logo" src='{{ 'images/logo2.png' }}'>
        <div class="icon_div">
            <img id="drink_icon" src='{{ 'images/sake_icon.png' }}' class='icons'>
        </div>
        <div class="icon_div">
            <img id="food_icon" src='{{ 'images/food_icon.png' }}' class='icons'>
        </div>

        <div class="menu"> 
            <ul id="food_menu">
                <li>
                    <a href='{{ URL::to('sb')}}' class='links'>Sushi Bar
                        <!-- <img src='{{ 'images/sushi_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Sushi Bar</p> -->
                    </a>
                </li>     
                <li>
                    <a href='{{ URL::to('ippin')}}' class='links'>Ippin
                        <!-- <img src='{{ 'images/ippin_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Ippin</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('roll')}}' class='links'>Roll
                        <!-- <img src='{{ 'images/rolls_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Roll</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('course')}}' class='links'>Course
                        <!-- <img src='{{ 'images/course_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Course</p> -->
                    </a>
                </li>
                <li>
                    <a href='{{ URL::to('lunch')}}' class='links'>Lunch
                        <!-- <img src='{{ 'images/lunch_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Lunch</p> -->
                    </a>
                </li>
        </ul>
        <ul id="drink_menu">
                <li>
                    <a href='{{ URL::to('sb')}}' class='links'>Sake
                        <!-- <img src='{{ 'images/sushi_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Sushi Bar</p> -->
                    </a>
                </li>     
                <li>
                    <a href='{{ URL::to('ippin')}}' class='links'>Wine
                        <!-- <img src='{{ 'images/ippin_icon_no_active.png' }}' class='icons'> -->
                        <!-- <p class="icon_name">Ippin</p> -->
                    </a>
                </li>
        </ul>
    </div>
</div>

</body>
<script>

    $("#food_icon").hover(function(){
        $("#food_menu").show("clip", 500);
        $("#drink_menu").hide("clip", 500);
    })
    $("#drink_icon").hover(function(){
        $("#drink_menu").show("clip", 500);
        $("#food_menu").hide("clip", 500);
    })


</script>
</html>