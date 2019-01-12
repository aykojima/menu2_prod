@extends('layouts.header')

@section('title', 'Wine')

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
                    <p class="drink_name">
                        {{ $product->name }} 
                        <small style="font-style: italic;">{{ $product->type }}</small>    
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
                        <p>
                            {{ $product->production_area }}  
                            @if(!empty ($product->year))            
                                / {{ $product->year }} 
                            @endif
                        </p>
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

//CSS
//Change the color of the years
// const this_year = (new Date()).getFullYear();
// $(".drink_details").filter(function(){
//     for ( var year = 1950; year < this_year + 1; year++ ) {
//         // console.log($(this).text());
//     if($(this).text().match(year))
//     {console.log();}
//     }
// });

$(document).ready(function(){
    $(".drink_title").each(function(){
        if($(this).data("id") == 17 || $(this).data("id") == 20){
            $(this).children(".add_new_drink").css("display", "none");
        }
    })
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
    const modal = $("#add_new_modal .modal_content");
    modal.find("input[name='category_id']").val($(this).parent().data("id"));

    modal.find("input[name='category_id']")
        .val($(this).parent().data("id"));
        
    modal.find(".form_category")
        .text($(this).parent().data("category")); 

    modal.find("input[name='category_name']")
        .val($(this).parent().data("category"))
        .css("color", "red"); 
    
    modal.find("input[name='category_desc']")
        .val($(this).prev().text()); 
});

//Edit Modal
$(document).on("click", ".edit", function(event){   
    $('#edit_modal').css('display', 'block');
    $.ajax({
        type : 'get',
        url : '{{URL::to('drinks/wine/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
            console.log(data);
                $("#edit_modal .modal_content input[name='product_id']").val(data.product.product_id),
                $("#edit_modal .modal_content input[name='name']").val(data.product.name),
                $("#edit_modal .modal_content input[name='price']").val(data.product.price),
                $("#edit_modal .modal_content input[name='production_area']").val(data.product.production_area),
                $("#edit_modal .modal_content input[name='type']").val(data.wine.type),
                $("#edit_modal .modal_content input[name='year']").val(data.wine.year),
                $("#edit_modal .modal_content input[name='description']").val(data.product.description);
                if(data.bottle){
                    $('#edit_modal .modal_content .bottle_size_hide').show(),
                    $("#edit_modal .modal_content input[name='size_checkbox']").prop('checked', true),
                    $("#edit_modal .modal_content input[name='size']").val(data.bottle.size);
                    if(data.bottle.second_price){
                        $("#edit_modal .modal_content input[name='second_price']").val(data.bottle.second_price);
                    }
                }else{
                    $('#edit_modal .modal_content .bottle_size_hide').hide(),
                    $("#edit_modal .modal_content input[name='size_checkbox']").prop('checked', false),
                    $("#edit_modal .modal_content input[name='size']").val('');
                }
            }
        });
    });

$('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('drinkswine/edit')}}',
        data: {'product_id': $("#edit_form input[name='product_id']").val(),
                'name': $("#edit_form input[name='name']").val(),
                'price': $("#edit_form input[name='price']").val(),
                'production_area': $("#edit_form input[name='production_area']").val(),
                'type': $("#edit_form input[name='type']").val(),
                'year': $("#edit_form input[name='year']").val(),
                'description': $("#edit_form input[name='description']").val(),
                'submit': $("#edit_form input[name='submit']").val()
        }
    });
});


</script>

@endsection


