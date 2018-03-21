<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>SKT menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" media="screen">
    <!--<link rel="stylesheet" href="../css/style-print.css" type="text/css" media="print"> -->
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
            <li id="print"><a href="javascript: window.print()"><img id="header_icons" src="../images/printer.png"></a><span>print</span></li>
            <!-- <li><a onclick="show_items()"><img id="header_icons" src="../images/search.png"></a><span>search items</span></li>    -->
            <!-- <li id="new_item"><a onclick="show_add_new_div()"><img id="header_icons" src="../images/add.png"></a><span>add new item</span></li>     -->
        </ul>
    </header> 

    <div class="nav" id="nav">
        <ul>
            <li><a href='{{ URL::to('sb')}}' class='nav_links'>
                <img src='{{ Request::is('sb') ? 'images/sushi_icon_active.png' : 'images/sushi_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                <p class="{{ Request::is('sb') ? 'nav_active' : 'nav_name' }}">Sushi Bar</p>
                </a>
            </li>     
            <li><a href='{{ URL::to('ippin')}}' class='nav_links'>
            <img src='{{ Request::is('ippin') ? 'images/ippin_icon_active.png' : 'images/ippin_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                <p class="{{ Request::is('ippin') == 'ippin' ? 'nav_active' : 'nav_name' }}">Ippin</p>
                </a>
            </li>
            <li><a href='{{ URL::to('roll')}}' class='nav_links'>
            <img src='{{ Request::is('roll') ? 'images/rolls_icon_active.png' : 'images/rolls_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                <p class="{{ Request::is('roll') == 'roll' ? 'nav_active' : 'nav_name' }}">Roll</p>
                </a>
            </li>
            <li><a href='{{ URL::to('course')}}' class='nav_links'>
            <img src='{{ Request::is('course') ? 'images/course_icon_active.png' : 'images/course_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                <p class="{{ Request::is('course') == 'course' ? 'nav_active' : 'nav_name' }}">Course</p>
                </a>
            </li>
            <li><a href='{{ URL::to('lunch')}}' class='nav_links'>
            <img src='{{ Request::is('lunch') ? 'images/lunch_icon_active.png' : 'images/lunch_icon_no_active.png' }} '.png'}}' class='nav_icons'>
                <p class="{{ Request::is('lunch') == 'lunch' ? 'nav_active' : 'nav_name' }}">Lunch</p>
                </a>
            </li>
            <?php 
            // $titleNames = array("sushi", "ippin", "lunch"); 
            // foreach($titleNames as $key => $titleName){
            //     $upperTitleName = ucfirst($titleName);
            //     $i = $key + 1;
            //     $activeNav = ${'activeNav' . $i}; 
            //     $activeP = ${'activeP' . $i}; 

            //     if($key ==2){
            //         echo"<li><a href='#' id='nav'><img src='../images/" . $titleName . "_icon" . $activeNav . ".png' class='nav_icons'>
            //             <p id='" . $activeP . "'>" . $upperTitleName . " Items</p></a>
            //             <ul>
            //                 <li><a href='weekend_" . $titleName . ".php'>Weekend</a></li>
            //                 <li><a href='weekday_" . $titleName . ".php'>Weekday</a></li>
            //             </ul></li>";
            //     }else{
            //         echo"<li><a href='" . $titleName . ".php' id='nav'><img src='../images/" . $titleName . "_icon" . $activeNav . ".png' class='nav_icons'> 
            //         <p id='" . $activeP . "'>" . $upperTitleName . " Menu</p></a></li>";
            //     }
            // } ?>
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