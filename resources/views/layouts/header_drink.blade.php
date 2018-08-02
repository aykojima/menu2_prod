<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>SKT menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ asset('css/app_drink_print.css') }}" type="text/css" media="print">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

</head>
<body>
    <header>
        <ul id="header">
            <li id="logout"><a href ="logout.php">Logout</a></li>
            <li class="icon"><a href="javascript:void(0)">&#9776;</a></li>
            <li><a href='{{ URL::to('/')}}'><img class="home_icon" src="../images/logo4.png"></a><span>Go to home</span></li>   
            <li id="print"><a href='{{ URL::to('/drinks/print')}}'><img id="header_icons" src="../images/printer.png"></a><span>Print Review</span></li>   
            <!-- <li id="print"><a href="javascript: window.print()"><img id="header_icons" src="../images/printer.png"></a><span>print</span></li> -->
            
            <!-- <li id="new_item"><a onclick="show_add_new_div()"><img id="header_icons" src="../images/add.png"></a><span>add new item</span></li>     -->
        </ul>
    </header> 

    <div class="nav" id="nav">
        <ul>
            <li><a href='{{ URL::to('cocktail')}}' class='nav_links'>
                    <img src='{{ Request::is('cocktail') ? 'images/cocktail_icon_active.png' : 'images/cocktail_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                    <p class="{{ Request::is('cocktail') == 'cocktail' ? 'nav_active' : 'nav_name' }}">Cocktail<br>Beer<br>Non Alcohol</p>
                </a>
            </li>
            <li>
                <a href='{{ URL::to('sake')}}' class='nav_links'>
                    <img src='{{ Request::is('sake') ? 'images/sake_icon.png' : 'images/sake_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                    <p class="{{ Request::is('sake') ? 'nav_active' : 'nav_name' }}">Sake</p>
                </a>
                @if(Request::is('sake'))
                <ul>
                     <li><a href='#sake_by_glass'>Sake By Glass</a></li>
                     <li><a href='#sake_bottles'>Sake Bottles</a></li>
                </ul>
                @endif
            </li>     
            <li><a href='{{ URL::to('wine')}}' class='nav_links'>
            <img src='{{ Request::is('wine') ? 'images/wine_icon_active.png' : 'images/wine_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                <p class="{{ Request::is('wine') == 'wine' ? 'nav_active' : 'nav_name' }}">Wine</p>
                </a>
            </li>
            <li><a href='{{ URL::to('shochu')}}' class='nav_links'>
            <img src='{{ Request::is('shochu') ? 'images/shochu_icon_active.png' : 'images/shochu_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                <p class="{{ Request::is('shochu') == 'shochu' ? 'nav_active' : 'nav_name' }}">Shochu<br> Whiskey<br>Spirits</p>
                </a>
            </li>
        </ul>
    </div>
@yield('content')

</body>
<script>
$( ".icon" ).click(function() {
    $( "#nav" ).toggleClass( "responsive" );
});

</script>
</html>