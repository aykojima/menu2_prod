@extends('layouts.header_drink')

@section('content')
<div class="drink_container">
@foreach($categories as $key => $category)
@if($key == 0)    
<div class="page1">
    <div id="menu"> 
        <div class='title_div'>
            <h1 class="title">SAKE BY THE GLASS</h1>
            <p>Region / Rice / SMV</p>
            <p>6 oz tokkuri</p>
        </div>
@elseif($key == 6)    
<div class="page2">
    <div id="menu"> 
    <div class='title_div'>
            <h1 class="title">SAKE BOTTLES</h1>
            <p>Region / Rice / SMV</p>
            <p>720 Bottle</p>
        </div>
@endif 
        <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
            <h3>{{ $category->category }}</h3>
            <p style="color: #ccc">{{ $category->description }}</p>
        
        
            @foreach($sake_glasses as $sake_glass)
                @if($sake_glass->category->category == $category->category)
                <div class="products">
                
                    <div>
                        <p class="drink_name">{{ $sake_glass->name }} 
                        @if(!empty ($sake_glass->sake))    
                        {{ $sake_glass->sake->grade }}</p>
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
        </div>    
        @if($key == 5)
        <h2>SEASONAL SAKE</h2>
        <div class="drink_categories" data-id="">
            
            
            <div class="products">
                
                <div>
                    <p class="drink_name">Rotating Nama (6oz tokkuri)</p>
                    <p class="drink_price">22</p>
                    <div class="drink_details">
                        <p>fresh, unpasteurized sake released seasonally; typically bright, bold, and distinctive.
                            *ask your server for today's selection
                        </p>
                    </div>
                </div>
            </div>  

            <div class="products">
            
                <div>
                    <p class="drink_name">Spring Sake Flight (3 kinds, 2 oz each)</p>
                    <p class="drink_price">20</p>
                    <div class="drink_details">
                        <p>three bright, light, and refreshing brews for the rainy season
                        </p>
                    </div>
                </div>
            </div>  
        </div>
    </div> 
    </div> 
    @endif
    @if ($key == 13)
    </div>
    @endif
@endforeach
</div>
<script>



</script>

@endsection


