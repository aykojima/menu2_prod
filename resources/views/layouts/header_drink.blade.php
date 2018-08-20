<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>SKT menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" media="screen">
    
    @if(Request::is('cocktail') || Request::is('special'))
    <link rel="stylesheet" href="{{ asset('css/app_drink_print_4.25in.css') }}" type="text/css" media="print">
    @else
    <link rel="stylesheet" href="{{ asset('css/app_drink_print.css') }}" type="text/css" media="print">
    @endif
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
            <li><a href='{{ URL::to('sb')}}'><img class="home_icons header_icons" src="../images/arrow.png"></a><span>Go to Sushi Bar</span></li>   
            @if(Request::is('cocktail') || Request::is('special'))
            <li id="print"><a href="javascript: window.print()"><img class="header_icons" src="../images/printer.png"></a><span>Print</span></li>
            @else
            <li id="print"><a href='{{ URL::to('/drinks/print')}}' target="_blank"><img class="header_icons" src="../images/printer.png"></a><span>Print Preview</span></li>   
            @endif
            
            
            <!-- <li id="new_item"><a onclick="show_add_new_div()"><img id="header_icons" src="../images/add.png"></a><span>add new item</span></li>     -->
        </ul>
    </header> 

    <div class="nav" id="nav">
        <ul>
            <li>
                <a href='{{ URL::to('cocktail')}}' class='nav_links'>
                    <img src='{{ Request::is('cocktail') ? 'images/cocktail_icon_active.png' : 'images/cocktail_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                    <p class="{{ Request::is('cocktail') == 'cocktail' ? 'nav_active' : 'nav_name' }} line_height_08">Cocktail<br>Beer<br>Non-Alcoholic</p>
                </a>
            </li>
            <li>
                <a href='{{ URL::to('sake')}}' class='nav_links'>
                    <img src='{{ Request::is('sake') ? 'images/sake_icon.png' : 'images/sake_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                    <p class="{{ Request::is('sake') ? 'nav_active' : 'nav_name' }}">Sake</p>
                </a>
                @if(Request::is('sake'))
                <ul>
                     <li><a href='#sake_by_glass'>Sake by the Glass</a></li>
                     <li><a href='#sake_bottles'>Sake Bottles</a></li>
                </ul>
                @endif
            </li>     
            <li>
                <a href='{{ URL::to('wine')}}' class='nav_links'>
                    <img src='{{ Request::is('wine') ? 'images/wine_icon_active.png' : 'images/wine_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                    <p class="{{ Request::is('wine') == 'wine' ? 'nav_active' : 'nav_name' }}">Wine</p>
                </a>
                @if(Request::is('wine'))
                <ul>
                     <li><a href='#wine_by_glass'>Wine by the Glass</a></li>
                     <li><a href='#wine_bottles'>Wine Bottles</a></li>
                </ul>
                @endif
            </li>
            <li>
                <a href='{{ URL::to('shochu')}}' class='nav_links'>
                    <img src='{{ Request::is('shochu') ? 'images/shochu_icon_active.png' : 'images/shochu_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                    <p class="{{ Request::is('shochu') == 'shochu' ? 'nav_active' : 'nav_name' }} line_height_08">Shochu<br> Whiskey<br>Spirits</p>
                </a>
                @if(Request::is('shochu'))
                <ul>
                     <li><a href='#shochu'>Shochu</a></li>
                     <li><a href='#whisky'>Whisky</a></li>
                     <li><a href='#spirits'>Spirits</a></li>
                </ul>
                @endif
            </li>
            <li>
                <a href='{{ URL::to('special')}}' class='nav_links'>
                    <img src='{{ Request::is('special') ? 'images/shochu_icon_active.png' : 'images/shochu_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                    <p class="{{ Request::is('special') == 'special' ? 'nav_active' : 'nav_name' }} line_height_08">Specials</p>
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

$(".header_icons").mouseover(function(e) {
    e.preventDefault();
    var target_span = $(this).parent().next();
    target_span.css("opacity", "100");
});
$(".header_icons").mouseout(function(e) {
    e.preventDefault();
    var target_span = $(this).parent().next();
    target_span.css("opacity", "0");
});

</script>
</html>