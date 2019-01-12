@extends('layouts.header')

@section('title', 'Cocktails')

@section('content')

<div id="container">
    <div id="menu">
        @foreach($category_array as $category)
            @foreach($category as $product)
                @if(in_array($product->title_id, $titles))
                    <div class='title_div'>
                        <h1 class="title">{{ $product->title_name}}</h1>
                        <p>{{ $product->title_description}}</p>
                        <p>{{ $product->title_size}}</p>
                    </div>
                @endif  
                @if ($loop->first)
                    <div id="" class="drink_title" data-id="{{ $product->category_id }}" data-category="{{ $product->category }}">
                        <p style="color: #CF671F; clear:both">{{ $product->category }}</p>
                        <p style="color: #ccc; font-size: 0.8em; padding-top: 2%;">{{ $product->category_description }}</p>
                        <a class="add_new_drink"> 
                            <img class="add_drinks" src='../images/add_icon_active.png'>
                        </a>
                    </div>
                    <hr>
                @endif
                <div class="products">
                    <a class="edit" data-id="{{ $product->product_id }}"><img class="edit_drinks" src='../images/edit_icon_active.png'></a>
                    <div>
                        <p class="drink_name">{{ $product->name }} 
                        <p class="drink_price">{{ $product->price }}</p>
                        <div class="drink_details">
                            <p>{{ $product->production_area }} 
                            <p>{{ $product->description }}</p>
                        <span>{{ $product->description2 }}</span>
                        </div><!--end of drink_details-->
                    </div>
                </div><!--end of products-->
            
                @php
                    {{  $last_title = $product->title_id;
                        if(in_array($last_title, $titles)){
                            $k = array_search($last_title, $titles);
                            unset($titles[$k]);
                        }
                    }}
                @endphp
            @endforeach<!--$category as $products -->
        @endforeach<!--$category_array as $category -->
    </div><!--end of menu-->  
</div><!-- end of drink_container div -->   


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
        url : '{{URL::to('cocktail/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
            console.log(data);
                $("#edit_modal .modal_content input[name='product_id']").val(data.product_id),
                $("#edit_modal .modal_content input[name='name']").val(data.name),
                $("#edit_modal .modal_content input[name='price']").val(data.price),
                $("#edit_modal .modal_content input[name='description']").val(data.description);
                }
            });
    });

$('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('cocktail/edit')}}',
        data: {'product_id': $("#edit_form input[name='product_id']").val(),
                'name': $("#edit_form input[name='name']").val(),
                'price': $("#edit_form input[name='price']").val(),
                'description': $("#edit_form input[name='description']").val(),
                'submit': $("#edit_form input[name='submit']").val()
        }
    });
});


</script>

@endsection


