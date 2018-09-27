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

        <div class="pages">
            <div class="page8">
                <div class="menu">
                    <div class='title_div'>
                        <h1 class="title">SHOCHU 焼酎</h1>
                        <p></p><!--need this for styling-->
                        <p>2 oz</p>
                    </div>
                    @foreach($categories as $category) 
                        @if($category->category_id == 25 )
                            @foreach($shochus as $shochu)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">
                                                {{ $shochu->name }} 
                                                <span style="color: #CCCCCC; font-size: 0.8em">{{ $shochu->production_area }}</span>
                                            </p>
                                            <p class="drink_price">{{ $shochu->price }}</p>
                                            <div class="drink_details">
                                                <p>{{ $shochu->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            <div class="products">
                                <div id="" class="drink_categories">
                                    <h3 class="" style="float: left">SHOCHU Flight</h3>
                                    <p class="drink_price">
                                        <span style="color: #CCCCCC">1oz each</span>
                                        16
                                    </p>
                                    <div class="drink_details">
                                        <p>Kawabe, Kakushigura, Kuro Kirishima</p>
                                    </div>
                                </div>
                            </div>  
                    <div class='title_div margin_top'>
                            <h1 class="title">SPIRITS</h1>
                    </div>
                        @elseif($category->category_id == 28 
                            || $category->category_id == 29
                            || $category->category_id == 30
                            || $category->category_id == 31
                            || $category->category_id == 32)
                            <div id="" class="drink_categories">
                                <h3 style="color: #CF671F; clear:both">{{ $category->category }}</h3>
                                <p style="color: #CCCCCC; float: right;">1.5 oz</p>
                            </div>
                            @foreach($spirits as $spirit)
                                @if($spirit->category->category_id == $category->category_id)            
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $spirit->name }} 
                                            <span style="color: #CCCCCC; font-size: 0.8em">{{ $spirit->production_area }}</span></p>
                                            <p class="drink_price">{{ $spirit->price }}</p>

                                            <div class="drink_details">
                                                <p>{{ $spirit->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif 
                    @endforeach 
                </div><!--menu-->
            </div><!--end of page8-->

            <div class="page1">
                <div class="menu">
                    <div class='title_div'>
                        <h1 class="title">SAKE BY THE GLASS</h1>
                        <p>Region / Rice / SMV</p>
                        <p>6 oz tokkuri</p>
                    </div>
                    @foreach($categories as $category) 
                        @if($category->category_id == 1 
                            || $category->category_id == 2
                            || $category->category_id == 3
                            || $category->category_id == 4
                            || $category->category_id == 5
                            || $category->category_id == 6 )
                            <div id="" class="drink_categories">
                                <h3>{{ $category->category }}</h3>
                                <p style="color: #CCCCCC; font-size: 0.8em; line-height: 1em;">{{ $category->description }}</p>
                            </div>
                            @foreach($sake_glasses as $sake_glass)
                                @if($sake_glass->category->category_id == $category->category_id)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $sake_glass->name }} 
                                            @if(!empty ($sake_glass->sake))    
                                                {{ $sake_glass->sake->grade }}
                                                @if($sake_glass->product_id == 1)
                                                    <span style="color:#CF671F;">warm or hot</span>
                                                @endif</p>
                                            @endif
                                            <p class="drink_price">{{ $sake_glass->price }}</p>
                                            <div class="drink_details">
                                                <p>{{ $sake_glass->production_area }} / 
                                                @if(!empty ($sake_glass->sake))            
                                                    {{ $sake_glass->sake->rice }} / {{ $sake_glass->sake->sweetness }}</p>
                                                @endif
                                                <p>{{ $sake_glass->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @elseif($category->category_id == 38)
                            <div id="" class="drink_categories">
                                <h2>SEASONAL SAKE</h2>
                                @foreach($flights as $flight)
                                    <div class="products">
                                        <p class="drink_name">{{ $flight->name }}
                                            <span>( {{ $flight->production_area }} )</span>
                                        </p>
                                        <p class="drink_price">{{ $flight->price }}</p>
                                        <div class="drink_details">
                                            <p>{{ $flight->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>    
                        @endif  
                    @endforeach 
                </div><!--end of menu-->
            </div><!--end of page1-->
        </div><!-- end of pages div -->    


        <div class="pages">
            <div class="page6">
                <div class="menu">
                    <div class='title_div'>
                        <h1 class="title">SAKE BOTTLES</h1>
                        <p>Region / Rice / SMV</p>
                        <p>720ml Bottle</p>
                    </div>
                    @foreach($categories as $category) 
                        @if($category->category_id == 7 
                            || $category->category_id == 8
                            || $category->category_id == 9)
                            <div id="" class="drink_categories">
                                <h3>{{ $category->category }}</h3>
                                <p style="color: #CCCCCC; font-size: 0.8em; line-height: 1em;">{{ $category->description }}</p>
                            </div>
                            @foreach($sake_bottles as $sake_bottle)
                                @if($sake_bottle->category->category_id == $category->category_id)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $sake_bottle->name }} 
                                            @if(!empty ($sake_bottle->sake))    
                                                {{ $sake_bottle->sake->grade }}
                                            @endif
                                            </p>
                                            <p class="drink_price">{{ $sake_bottle->price }}</p>
                                            <div class="drink_details">
                                                <p>{{ $sake_bottle->production_area }} 
                                                @if(!empty ($sake_bottle->sake))    
                                                    @if($sake_bottle->sake->rice)        
                                                    / {{ $sake_bottle->sake->rice }} 
                                                    @endif
                                                    @if($sake_bottle->sake->sweetness)
                                                    / {{ $sake_bottle->sake->sweetness }}
                                                    @endif
                                                    </p>
                                                @endif    
                                                <p>{{ $sake_bottle->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif 
                    @endforeach
                </div><!--end of menu-->
            </div><!--end of page6-->


            <div class="page3">
                <div class="menu">     
                    <div class='title_div'>
                        <h1 class="title">JAPANESE WHISKY ウィスキー</h1>
                        <p></p><!--need this for styling-->
                        <p>1.5 oz</p>
                    </div>
                    @foreach($categories as $category) 
                        @if($category->category_id == 26 )
                            @foreach($whiskies as $whisky)    
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $whisky->name }} 
                                                <span style="color: #CCCCCC; font-size: 0.8em">{{ $whisky->production_area }}</span>
                                            </p>
                                            <p class="drink_price">{{ $whisky->price }}</p>
                                            <div class="drink_details">
                                                <p>{{ $whisky->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            <div class="products">
                                <div id="" class="drink_categories">
                                    <h3 class="" style="float: left">JAPANESE WHISKY 
                                        <span style="font-size: 0.9em">Rotating Flight</span>
                                    </h3>
                                    <p class="drink_price">
                                        <span style="color: #CCCCCC">0.75 oz each</span>
                                        29
                                    </p>
                                </div>
                            </div>  
                        @endif 
                    @endforeach
                </div><!-- end of menu -->   
            </div><!-- end of page3 -->   
        </div><!-- end of pages div -->   

        <div class="pages">
            <div class="page2">
                <div class="menu">
                    @foreach($categories as $category) 
                        @if($category->category_id == 23 
                            || $category->category_id == 24)
                            <div id="" class="drink_categories">
                                <h2>{{ $category->category }}</h2>
                            </div>
                            @foreach($rose_and_reds as $rose_and_red)
                                @if($rose_and_red->category->category_id == $category->category_id)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $rose_and_red->name }} 
                                                @if(!empty ($rose_and_red->wine))    
                                                <small>{{ $rose_and_red->wine->type }}</small></p>
                                                @endif
                                            <p class="drink_price">{{ $rose_and_red->price }}</p>
                                            @if(!empty ($rose_and_red->wine->bottle))    
                                                <p class="bottle_size"><small>{{ $rose_and_red->wine->bottle->size }}ml</small>
                                                    @if($rose_and_red->wine->bottle->second_price)    
                                                        {{ $rose_and_red->wine->bottle->second_price }} / 
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="drink_details">
                                                <p>{{ $rose_and_red->production_area }} 
                                                    @if(!empty ($rose_and_red->wine))    
                                                        @if($rose_and_red->wine->year) 
                                                            <span>{{ $rose_and_red->wine->year }}</span>
                                                        @endif
                                                    @endif
                                                </p>
                                                <p>{{ $rose_and_red->description }}</p>
                                            </div>
                                        </div>
                                    </div><!--end of products-->
                                @endif
                            @endforeach
                        @endif 
                    @endforeach 
                </div>
            </div>

            <div class="page7">
                <div class="menu">
                    @foreach($categories as $category) 
                        @if($category->category_id == 10 
                            || $category->category_id == 11
                            || $category->category_id == 12
                            || $category->category_id == 13
                            || $category->category_id == 14)
                            <div id="" class="drink_categories">
                                <h3>{{ $category->category }}</h3>
                                <p style="color: #ccc; font-size: 0.8em;">{{ $category->description }}</p>
                            </div>
                            @foreach($sake_bottle2s as $sake_bottle2)
                                @if($sake_bottle2->category->category_id == $category->category_id)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">
                                                {{ $sake_bottle2->name }} 
                                                @if(!empty ($sake_bottle2->sake))    
                                                    {{ $sake_bottle2->sake->grade }}
                                                @endif
                                            </p>
                                            <p class="drink_price">{{ $sake_bottle2->price }}</p>
                                            <div class="drink_details">
                                                <p>{{ $sake_bottle2->production_area }}  
                                                    @if(!empty ($sake_bottle2->sake))            
                                                        / {{ $sake_bottle2->sake->rice }} / {{ $sake_bottle2->sake->sweetness }}
                                                    @endif
                                                </p>
                                                <p>{{ $sake_bottle2->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif 
                    @endforeach 
                </div><!-- end of menu div -->    
            </div><!-- end of page7 -->    
        </div><!-- end of pages div -->    

        <div class="pages">
            <div class="page4">
                <div class="menu">
                    <div class='title_div'>
                        <h1 class="title">WINE BY THE GLASS</h1>
                        <p></p><!--need this for styling-->
                        <p>5 oz pour</p>
                    </div>
                    @foreach($categories as $category) 
                        @if($category->category_id == 15)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h3>{{ $category->category }}</h3> 
                            </div>    
                            @foreach($wine_glasses as $wine_glass)
                                @if($wine_glass->category_id == 15)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $wine_glass->name }} 
                                                @if(!empty ($wine_glass->wine))    
                                                    <small>{{ $wine_glass->wine->type }}</small>    
                                                @endif
                                            </p>
                                            <p class="drink_price">{{ $wine_glass->price }}</p>
                                            @if(!empty ($wine_glass->wine->bottle))    
                                                <p class="bottle_size">
                                                    <small>{{ $wine_glass->wine->bottle->size }}ml</small>
                                                    @if(!empty ($wine_glass->wine->bottle->second_price)  )  
                                                        {{ $wine_glass->wine->bottle->second_price }} / 
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="drink_details">
                                                <p>{{ $wine_glass->production_area }} 
                                                    @if(!empty ($wine_glass->wine))    
                                                        @if($wine_glass->wine->year) 
                                                            <span>{{ $wine_glass->wine->year }}</span>
                                                        @endif
                                                    @endif 
                                                </p>   
                                                <p>{{ $wine_glass->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach    
                        @elseif($category->category_id == 16)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h3 style="color: #CF671F; clear:both">{{ $category->category }}</h3> 
                            </div>    
                            @foreach($wine_glasses as $wine_glass)
                                @if($wine_glass->category_id == 16)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $wine_glass->name }} 
                                                @if(!empty ($wine_glass->wine))    
                                                <small>{{ $wine_glass->wine->type }}</small>
                                                @endif
                                            </p>
                                            <p class="drink_price">{{ $wine_glass->price }}</p>
                                            @if(!empty ($wine_glass->wine->bottle))    
                                                <p class="bottle_size">
                                                    <small>{{ $wine_glass->wine->bottle->size }}ml</small>
                                                    @if(!empty ($wine_glass->wine->bottle->second_price)  )  
                                                        {{ $wine_glass->wine->bottle->second_price }} / 
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="drink_details">
                                                <p>{{ $wine_glass->production_area }} 
                                                    @if(!empty ($wine_glass->wine))    
                                                        @if($wine_glass->wine->year) 
                                                        <span>       
                                                            {{ $wine_glass->wine->year }} 
                                                        </span>
                                                        @endif
                                                    @endif
                                                </p>    
                                                <p>{{ $wine_glass->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @elseif($category->category_id == 17)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h3 style="color: #CF671F; clear:both">{{ $category->category }}</h3>
                            </div>   
                            <p class="rotating_wine">Anything goes -- from dry Riesling to white Burgundy</p>
                            <p class="rotating_wine">Ask your server about today's pour!</p> 
                        @elseif($category->category_id == 18)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h3 style="color: #CF671F; clear:both">{{ $category->category }}</h3> 
                            </div>    
                            @foreach($wine_glasses as $wine_glass)
                                @if($wine_glass->category_id == 18)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $wine_glass->name }} 
                                                @if(!empty ($wine_glass->wine))    
                                                    <small>{{ $wine_glass->wine->type }}</small>
                                                @endif
                                            </p>
                                            <p class="drink_price">{{ $wine_glass->price }}</p>
                                                @if(!empty ($wine_glass->wine->bottle))    
                                                    <p class="bottle_size">
                                                        <small>{{ $wine_glass->wine->bottle->size }}ml</small>
                                                        @if(!empty ($wine_glass->wine->bottle->second_price)  )  
                                                            {{ $wine_glass->wine->bottle->second_price }} / 
                                                        @endif
                                                    </p>
                                                @endif
                                            </p>
                                            <div class="drink_details">
                                                <p>{{ $wine_glass->production_area }} 
                                                    @if(!empty ($wine_glass->wine))    
                                                        @if($wine_glass->wine->year) 
                                                        <span>       
                                                            {{ $wine_glass->wine->year }} 
                                                        </span>
                                                        @endif
                                                    @endif    
                                                </p>
                                                <p>{{ $wine_glass->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @elseif($category->category_id == 19)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h3 style="color: #CF671F; clear:both">{{ $category->category }}</h3> 
                            </div>    
                            @foreach($wine_glasses as $wine_glass)
                                @if($wine_glass->category_id == 19)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $wine_glass->name }} 
                                                @if(!empty ($wine_glass->wine))    
                                                <small>{{ $wine_glass->wine->type }}</small>
                                                @endif
                                            </p>
                                            <p class="drink_price">{{ $wine_glass->price }}</p>
                                                @if(!empty ($wine_glass->wine->bottle))    
                                                    <p class="bottle_size">
                                                        <small>{{ $wine_glass->wine->bottle->size }}ml</small>
                                                        @if(!empty ($wine_glass->wine->bottle->second_price)  )  
                                                            {{ $wine_glass->wine->bottle->second_price }} / 
                                                        @endif
                                                    </p>
                                                @endif
                                            </p>
                                            <div class="drink_details">
                                                <p>{{ $wine_glass->production_area }} 
                                                    @if(!empty ($wine_glass->wine))    
                                                        @if($wine_glass->wine->year) 
                                                        <span>{{ $wine_glass->wine->year }} </span>
                                                        @endif
                                                    @endif    
                                                </p>
                                                <p>{{ $wine_glass->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @elseif($category->category_id == 20)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h3 style="color: #CF671F; clear:both">{{ $category->category }}</h3> 
                            </div>   
                            <p class="rotating_wine">Typically bright, light varietals like Pinot Noir, Tempranillo, or Barbera. 
                                    Ask your server about today's pour!</p>
                        @endif
                    @endforeach
                    <div class='title_div margin_top'>
                        <h1 class="title">WINE BOTTLES</h1>
                        <p></p><!--need this for styling-->
                        <p>750ml</p>
                    </div>
                    @foreach($categories as $category) 
                        @if($category->category_id == 21)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h2 style="color: #CF671F; clear:both">{{ $category->category }}</h2> 
                            </div>    
                            @foreach($wine_glasses as $wine_glass)
                                @if($wine_glass->category_id == 21)
                                    <div class="products">
                                        <div>
                                            <p class="drink_name">{{ $wine_glass->name }} 
                                            @if(!empty ($wine_glass->wine))    
                                                <small>{{ $wine_glass->wine->type }}</small>
                                            @endif
                                            </p>
                                            <p class="drink_price">{{ $wine_glass->price }}</p>
                                            @if(!empty ($wine_glass->wine->bottle))    
                                                <p class="bottle_size"><small>{{ $wine_glass->wine->bottle->size }}ml</small>
                                                    @if($wine_glass->wine->bottle->second_price)    
                                                        {{ $wine_glass->wine->bottle->second_price }} / 
                                                    @endif
                                                </p>
                                            @endif
                                            <div class="drink_details">
                                                <p>{{ $wine_glass->production_area }} 
                                                @if(!empty ($wine_glass->wine))    
                                                    @if($wine_glass->wine->year) 
                                                        <span>{{ $wine_glass->wine->year }}</span>
                                                    @endif
                                                @endif    
                                                </p>
                                                <p>{{ $wine_glass->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div><!--end of menu -->
            </div><!--end of page4 -->
            <div class="page5">
                <div class="menu small_margin_top">
                    @foreach($categories as $category) 
                        @if($category->category_id == 22)
                            <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
                                <h2 style="color: #CF671F; clear:both">{{ $category->category }}</h2> 
                            </div>    
                            @foreach($whites as $white)
                                <div class="products">
                                    <div>
                                        <p class="drink_name">{{ $white->name }} 
                                        @if(!empty ($white->wine))    
                                            <small>{{ $white->wine->type }}</small>
                                        @endif
                                        </p>
                                        <p class="drink_price">{{ $white->price }}</p>
                                        @if(!empty ($white->wine->bottle))    
                                            <p class="bottle_size">
                                                <small>{{ $white->wine->bottle->size }}ml</small>
                                            @if($white->wine->bottle->second_price)    
                                                {{ $white->wine->bottle->second_price }} / 
                                            @endif
                                            </p>
                                        @endif
                                        <div class="drink_details">
                                            <p>{{ $white->production_area }} 
                                            @if(!empty ($white->wine))    
                                                @if($white->wine->year) 
                                                    <span>{{ $white->wine->year }}</span>
                                                @endif
                                            @endif
                                            </p>    
                                            <p>{{ $white->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div><!-- end of pages div -->    
    </div><!-- end of container div -->    
    

           
    


</div>
<script>



$(document).ready(function(){

    //Need to fix here
    //Make each if statement callback function so that it checks the height each time the function is called.
    function smallMargin(current_page){
        var height = current_page.outerHeight();
        if(height >= 1250){
            current_page.find(".products").addClass("small_margin");
            height = current_page.outerHeight();
            console.log('first ' + height);
            smallMarginTop(height, current_page);
        }
    }
    function smallMarginTop(height, current_page){
        if(height >= 1250){
            current_page.addClass("small_margin_top");
            height = $(this).outerHeight();
            console.log('second ' + height);
            noMargin(height, current_page)
        }
    }

    function noMargin(height, current_page){
        if(height >= 1250){
            console.log('third ' + height);
            current_page.find(".products").addClass("no_margin");
        }
    }
    $(".menu").each(function(){
        var height = $(this).outerHeight();
        var current_page = $(this);
        console.log('original ' + height);
        smallMargin(current_page);
    });
    
    $(".title").each(function(){
        if($(this).outerHeight() >= 50){
            $(this).addClass("small_title_font");
        }
    })

    $("h3").each(function(){
        if($(this).outerHeight() >= 30){
            $(this).addClass("small_font");
        }
    })

    $(".drink_name").each(function(){
        if($(this).text().length >= 50)
        {
            $(this).addClass("small_font");
        }
    })
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

</body>
</html>


