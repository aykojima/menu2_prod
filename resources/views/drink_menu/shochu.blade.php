@extends('layouts.header')
 
@section('title', 'Shochu Whiskey Spirits')

@section('content')
<div id='add_new_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_add_new_tab' onclick='hide_add_new_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'shochu_add_new']) !!}
        {!! Form::hidden('category_id') !!}
        @include('layouts.forms.form_drink')
        {!! Form::submit('Save') !!}
        {!! Form::close() !!}
    </div>
 </div>

 <div id='edit_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_edit_tab' onclick='hide_edit_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'shochu_edit_submit']) !!}
        {!! Form::hidden('product_id') !!}
        @include('layouts.forms.form_drink')
        <div class="buttons">
            <input value="Update" type="submit" name="submit">
            <input value="Delete" type="submit" name="submit">
            <!-- <a href="#">Delete</a> -->
        </div>
        {!! Form::close() !!} 
    </div>    
 </div>

<div id="container">
    
    <div id="menu">        
        @foreach($categories as $key => $category)
        @if($key == 0)
        <div id="shochu" class='title_div'>
            <h1 class='title'> SHOCHU 焼酎</h1>   
            <p></p><!--need this for styling-->
            <p>2 oz</p> 
        </div>
        @elseif($key == 1)
        <!-- <div class="products">
            <div>
                <h3 class="" style="float: left">SHOCHU Flight</h3>
                <p class="drink_price">
                    <span style="color: #CCCCCC">1oz each</span>
                    16
                </p>
                <div class="drink_details">
                    <p>Kawabe, Kakushigura, Kuro Kirishima</p>
                </div>
            </div>
        </div>   -->
        
        <div id="whisky" class='title_div margin_top'>
            <h1 class='title' style="font-size: 1.6em;"> JAPANESE WHISKY ウイスキー</h1>
            <p></p><!--need this for styling-->
            <p>1.5 oz</p> 
        </div>
        @elseif($key == 2)
        <div class="products">
            <div>
                <h3 class="" style="float: left">JAPANESE WHISKY 
                    <span style="font-size: 0.9em">Rotating Flight</span>
                </h3>
                <p class="drink_price">
                    <span style="color: #CCCCCC">0.75 oz each</span>
                    29
                </p>
                <div class="drink_details">
                </div>
            </div>
        </div>  
        <div id="spirits" class='title_div margin_top'>
            <h1 class="title"> SRIPITS</h1>
        </div>
        @endif   
        
        <div id="" class="drink_title" data-id="{{ $category->category_id }}" data-category="{{ $category->category }}">
        <p style="color: #CF671F; clear:both">{{ $category->category }}</p>
        <a class="add_new_drink"> <img class="add_drinks" src='images/add_icon_active.png'></a>
        <hr>
        </h1>
        @foreach($drinks as $drink)
            @if($drink->category->category == $category->category)
                @if($drink->category->category_id == 25)
                <div class="products">
                <a class="edit" data-id="{{ $drink->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
                    <div>
                        <p class="drink_name">{{ $drink->name }} 
                            <span style="font-style: italic; font-size: 0.8em">{{ $drink->description2 }}</span>
                            <span style="color: #CCCCCC; font-size: 0.8em">{{ $drink->production_area }}</span>
                        </p>
                        <p class="drink_price">{{ $drink->price }}</p>

                        <div class="drink_details">
                            <p>{{ $drink->description }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                @elseif($drink->category->category_id >= 26)
                <div class="products">
                <a class="edit" data-id="{{ $drink->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
                <div>
                    <p class="drink_name">{{ $drink->name }} 
                        <span style="font-style: italic; font-size: 0.8em">{{ $drink->description2 }}</span>
                        <span style="color: #CCCCCC; font-size: 0.8em">{{ $drink->production_area }}</span>
                    </p>
                    <p class="drink_price">{{ $drink->price }}</p>
                    <div class="drink_details">
                        <p>{{ $drink->description }}</p>
                    </div>
                </div>
                    <!-- <div>
                        <p class="drink_name">{{ $drink->name }} {{ $drink->description }}
                        <span style="color: #CCCCCC; font-size: 0.8em">{{ $drink->production_area }}</span></p>
                        <p class="drink_price">{{ $drink->price }}</p>
                        <div class="drink_details"></div>
                    </div> -->
                </div>
                <hr>
                @endif
            @endif
        @endforeach
        
        
        @endforeach
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
    // console.log($(this).data('id'));
    $.ajax({
        type : 'get',
        url : '{{URL::to('sake/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
            // console.log(data);
                $("#edit_modal .modal_content input[name='product_id']").val(data.product.product_id),
                $("#edit_modal .modal_content input[name='name']").val(data.product.name),
                $("#edit_modal .modal_content input[name='description2']").val(data.product.description2),
                $("#edit_modal .modal_content input[name='price']").val(data.product.price),
                $("#edit_modal .modal_content input[name='production_area']").val(data.product.production_area),
                $("#edit_modal .modal_content input[name='description']").val(data.product.description);
                }
            });
    });

$('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'post',
        url : '{{URL::to('shochu/edit')}}',
        data: {'product_id': $("#edit_form input[name='product_id']").val(),
                'name': $("#edit_form input[name='name']").val(),
                'description2': $("#edit_form input[name='description2']").val(),
                'price': $("#edit_form input[name='price']").val(),
                'production_area': $("#edit_form input[name='production_area']").val(),
                'description': $("#edit_form input[name='description']").val(),
                'submit': $("#edit_form input[name='submit']").val()
        }
    });
});


</script>

@endsection


