@extends('layouts.header_drink')

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
        @if($key == 0)
        <h1 id="sake_by_glass">
        SAKE BY THE GLASS
        @elseif($key == 6)
        <h1 id="sake_bottles">
        SAKE BOTTLES
        @endif
        </h1>
        <div id="" class="drink_categories" data-id="{{ $category->category_id }}" data-category="{{ $category->category }}">
        <p style="color: #CF671F; clear:both">{{ $category->category }}</p>
        <p style="color: #ccc; font-size: 0.8em;">{{ $category->description }}</p>
        <a class="add_new_drink"> <img class="add_drinks" src='images/add_icon_active.png'></a>
        <hr>
            @foreach($sake_glasses as $sake_glass)
                @if($sake_glass->category->category == $category->category)
                <div class="products">
                <a class="edit" data-id="{{ $sake_glass->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
                    <div>
                        <p class="drink_name">{{ $sake_glass->name }} 
                        @if(!empty ($sake_glass->sake))    
                        <small>{{ $sake_glass->sake->grade }}</small></p>
                        @endif
                        <p class="drink_price">{{ $sake_glass->price }}</p>
                        @if(!empty ($sake_glass->sake->bottle))    
                        <p class="bottle_size">{{ $sake_glass->sake->bottle->size }}ml</p>
                        @endif

                        <div class="drink_details">
                            <p>{{ $sake_glass->production_area }} 
                            @if(!empty ($sake_glass->sake))    
                                @if($sake_glass->sake->rice)        
                                / {{ $sake_glass->sake->rice }} 
                                @endif
                                @if($sake_glass->sake->sweetness)
                                / {{ $sake_glass->sake->sweetness }}
                                @endif
                                </p>
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


//Forms
$(document).ready(function(){
     $("input[name='size_checkbox']").change(function(){
        if(this.checked)
            $('.bottle_size_hide').fadeIn('slow');
        else
            $('.bottle_size_hide').fadeOut('slow');
    });

    $("select[name='sweetness']").change(function(){
        if($(this).children("option").filter(":selected").text() == 'Other')
            $('.sweetness_hide').fadeIn('slow');
        else
            $('.sweetness_hide').fadeOut('slow');
    });
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
    $("#add_new_modal .modal_content .form_category")
        .text($(this).parent().data("category")); 
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
                'description': $("#edit_form input[name='description']").val(),
                'submit': $("#edit_form input[name='submit']").val()
        }
    });
});


</script>

@endsection


