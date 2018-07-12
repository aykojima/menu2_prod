@extends('layouts.header')

@section('content')
<div id='add_new_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_add_new_tab' onclick='hide_add_new_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'sake_add_new']) !!}
        {!! Form::hidden('category_id') !!}
        @include('layouts.form_sake_new')
        {!! Form::close() !!}
    </div>
 </div>

 <div id='edit_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_edit_tab' onclick='hide_edit_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'sake_edit_submit']) !!}
        {!! Form::hidden('product_id') !!}
        @include('layouts.form_sake_edit')
        {!! Form::close() !!}
    </div>    
 </div>

<div id="container">
    
    <div id="menu">        
        @foreach($categories as $key => $category)
        <h1 id="ippin">
        @if($key == 0)    
        SAKE BY THE GLASS
        @elseif($key == 6)
        SAKE BOTTLES
        @endif
        </h1>
        <div id="" class="drink_categories" data-id="{{ $category->category_id }}">
        <p style="color: #CF671F; clear:both">{{ $category->category }}</p>
        <p style="color: #ccc">{{ $category->description }}</p>
        <a class="add_new_drink"> <img class="add_drinks" src='images/add_icon_active.png'></a>
        <hr>
            @foreach($sake_glasses as $sake_glass)
                @if($sake_glass->category->category == $category->category)
                <div class="products">
                <a class="edit" data-id="{{ $sake_glass->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
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
                <hr>
                @endif
            @endforeach
        </div>    
        @if($key == 5)
        <h2>SEASONAL SAKE</h2>
    <div class="drink_categories" data-id="">
        <a class="add_new_drink"> <img class="add_drinks" src='images/add_icon_active.png'></a>
        <hr>  
        <div class="products">
            <a class="edit" data-id=""><img class="edit_drinks" src='images/edit_icon_active.png'></a>
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
            <a class="edit" data-id=""><img class="edit_drinks" src='images/edit_icon_active.png'></a>
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
        @endif
        @endforeach
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
// Notification box
$("#notification").fadeIn("slow");
$(".dismiss").click(function(){
       $("#notification").fadeOut("slow");
});


// Add New Modal

$(document).on("click", ".add_new_drink", function(){   
    $('#add_new_modal').css('display', 'block');
});

$(document).on("click", ".close", function(){
    $('#add_new_modal').css('display', 'none');
    $('#edit_modal').css('display', 'none');
});


$(window).click(function(event) {
    if (event.target == $('#add_new_modal')[0]) {
        $('#add_new_modal').css('display', 'none');
    }else if (event.target == $('#edit_modal')[0]) {
        $('#edit_modal').css('display', 'none');
    }
});

$(document).on("click", ".add_new_drink", function(event){
    $("#add_new_modal .modal_content input[name='category_id']")
        .val($(this).parent().data("id"));
});

//Edit Modal
$(document).on("click", ".edit", function(event){   
    $('#edit_modal').css('display', 'block');
    $.ajax({
        type : 'get',
        url : '{{URL::to('sake/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
            console.log(data);
                $("#edit_modal .modal_content input[name='product_id']").val(data.product_id),
                $("#edit_modal .modal_content input[name='name']").val(data.name),
                $("#edit_modal .modal_content input[name='price']").val(data.price),
                $("#edit_modal .modal_content input[name='production_area']").val(data.production_area),
                $("#edit_modal .modal_content input[name='rice']").val(data.rice),
                $("#edit_modal .modal_content input[name='sweetness']").val(data.sweetness),
                $("#edit_modal .modal_content input[name='description']").val(data.description);
                }
            });
    });

$('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('sake/edit')}}',
        data: {'product_id': $("#edit_form input[name='product_id']").val(),
                'name': $("#edit_form input[name='name']").val(),
                'price': $("#edit_form input[name='price']").val(),
                'production_area': $("#edit_form input[name='production_area']").val(),
                'rice': $("#edit_form input[name='rice']").val(),
                'sweetness': $("#edit_form input[name='sweetness']").val(),
                'description': $("#edit_form input[name='description']").val()
        }
    });
});


</script>

@endsection


