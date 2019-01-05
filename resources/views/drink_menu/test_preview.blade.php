<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>SKT menu - Drink Preview @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" media="screen">
    
    @if(Request::is('cocktail'))
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
            <li><a href='{{ URL::to('sake')}}'><img class="home_icon header_icons" src="../images/arrow.png"></a><span>Go back to edit page</span></li>   
            <li id="print"><a href="javascript: window.print()"><img class="header_icons" src="../images/printer.png"></a><span>Print</span></li>
            <!-- <li id="print"><a href="javascript: window.print()"><img id="header_icons" src="../images/printer.png"></a><span>print</span></li> -->
            
            <!-- <li id="new_item"><a onclick="show_add_new_div()"><img id="header_icons" src="../images/add.png"></a><span>add new item</span></li>     -->
        </ul>
    </header> 

    <div class="drink_container">
    @foreach($page_array as $key => $category_array) 
        @if( $key % 2 == 1 )
            <div class="pages">
            @endif
            @if( $key % 2 == 1 )
            <div class="page1">
            @else
            <div class="page2">
            @endif
            @foreach($page_titles as $page_title) 
                @if ($page_title->title_id == $key + 1)
                        <div class='title_div'>
                            <h1 class="title">{{ $page_title->title_name}}</h1>
                            <p>{{ $page_title->title_description}}</p>
                            <p>{{ $page_title->title_size}}</p>
                        </div>
                @endif
            @endforeach
        @foreach($category_array as $key => $product_array)    
            <div class="menu">
                
                @foreach($product_array as $products)
                
                    @foreach($products as $product)
                        @if ($loop->first)
                        <div  class="drink_categories" >
                            <h3>{{ $product->category }}</h3>
                            <p style="color: #CCCCCC; font-size: 0.8em; line-height: 1em;">{{ $product->category_description }}</p>
                        </div>
                        @endif
                        <div class="products">
                            <div>
                                <p class="drink_name">
                                    {{ $product->name }} {{ $product->grade }}
                                    <small style="font-style: italic">{{ $product->type }}</small>    
                                </p>
                                <p class="drink_price">{{ $product->price }}</p>
                                <p class="bottle_size">
                                    @if(!empty ($product->size))    
                                        <small>{{ $product->size }}ml</small>
                                    @endif
                                    @if(!empty ($product->second_price)  )  
                                        {{ $product->second_price }} / 
                                    @endif
                                </p>
                                <div class="drink_details">
                                    <p>{{ $product->production_area }}  
                                        @if(!empty ($product->rice))            
                                            / {{ $product->rice }} / {{ $product->sweetness }}
                                        @endif
                                        @if(!empty ($product->year))    
                                            @if($product->year) 
                                                <span>{{ $product->year }}</span>
                                            @endif
                                        @endif
                                    </p>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                        {{ $product->description2 }}
                    @endforeach
                @endforeach
                </div><!--end of menu-->
            @endforeach
            </div><!--end of page1-->
        @endforeach   
    </div><!-- end of pages div -->    