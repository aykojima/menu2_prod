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
            @if( $key % 2 == 0 )
                <div class="pages">
                <div class="page_left">
            @else
                <div class="page_right">
            @endif
            <div class="menu">
            @foreach($category_array as $product_array)
                @foreach($product_array as $products)
                    @foreach($products as $product)
                        @if(in_array($product->title_id, $titles_array))
                            <div class='title_div'>
                                <h1 class="title">{{ $product->title_name}}</h1>
                                <p>{{ $product->title_description}}</p>
                                <p>{{ $product->title_size}}</p>
                            </div>
                        @endif
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
                                </div><!--end of drink_details-->
                            </div>
                        </div><!--end of products-->
                        {{ $product->description2 }}
                        @php
                        {{  $last_title = $product->title_id;
                            if(in_array($last_title, $titles_array)){
                                $k = array_search($last_title, $titles_array);
                                unset($titles_array[$k]);
                            }
                        }}
                        @endphp
                    @endforeach
                @endforeach
            @endforeach<!--($category_array as $product_array)-->
            </div><!--end of menu-->
            @if( $key % 2 == 0 )
            </div><!--end of page_left-->
            @else( $key % 2 == 1 )
            </div><!--end of page_right-->
            </div><!--end of pages-->
            @endif
        @endforeach<!-- ($page_array as $key => $category_array)  -->
        
    </div><!-- end of drink_container div -->    