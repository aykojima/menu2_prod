@extends('layouts.header')

@section('content')
 
<div id="container">
    
    <div id="menu">
        <h1 id="ippin">
            SAKE BY THE GLASS
        </h1>
        
        <div>
            @foreach($sake_glasses as $sake_glass)
            <p style="color: red">{{ $sake_glass->category->category }}</p>
            <p style="color: #ccc">{{ $sake_glass->category->description }}</p>
            <div>
                <div>
                    <p class="drink_name">{{ $sake_glass->name }} {{ $sake_glass->sake->grade }}</p>
                    <p class="drink_price">{{ $sake_glass->price }}</p>
                    <div class="drink_details">
                        <p>{{ $sake_glass->production_area }} / {{ $sake_glass->sake->rice }} / {{ $sake_glass->sake->sweetness }}</p>
                        <p>{{ $sake_glass->description }}</p>
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
</div>

@if(session('status'))
<div id="notification" style="display: none;">
  <span class="dismiss"><a title="dismiss this notification">x</a></span>
  <br>
  {{ session('status')}}
  <br>
  <br>
  <hr>
</div>
@endif

<script>

</script>

@endsection


