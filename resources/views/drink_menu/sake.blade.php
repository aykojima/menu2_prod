@extends('layouts.header')

@section('title', 'Sake')

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
                            <small style="font-style: italic;">{{ $product->grade }}</small>    
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
                                @if(!empty ($product->rice))            
                                    / {{ $product->rice }} 
                                @endif
                                @if(!empty ($product->sweetness))       
                                / {{ $product->sweetness }}
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

//Forms

// Add New Modal

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
    $('#add_new_modal').css('display', 'block');

    const modal = $("#add_new_modal .modal_content");
    modal.find("input[name='category_id']").val($(this).parent().data("id"));
    
    if($(this).parent().data("id") == 38)
    {
        modal.find(".hide_when_flight").hide();
        modal.find("input[name='production_area']").attr("placeholder", "Amount e.g.(6 oz tokkuri)");
    }else
    {
        modal.find(".hide_when_flight").show();
        modal.find("input[name='production_area']").attr("placeholder", "Production Area e.g.(Nagano)");
    }
     
    modal.find("input[name='category_name']")
        .val($(this).parent().data("category"))
        .css("color", "red"); 
    
    modal.find("input[name='category_desc']")
        .val($(this).prev().text()); 
    
    modal.find("input[name='size_checkbox']").change(function(){
        if(this.checked)
            modal.find(" .bottle_size_hide").fadeIn('slow');
        else
            modal.find(" .bottle_size_hide").fadeOut('slow');
    });

    modal.find("select[name='sweetness']").change(function(){
        if($(this).children("option").filter(":selected").text() == 'Other')
            modal.find(" .sweetness_hide").fadeIn('slow');
        else
            modal.find(" .sweetness_hide").fadeOut('slow');
    });
});

//Edit Modal
$(document).on("click", ".edit", function(event){   
    $('#edit_modal').css('display', 'block');

    $.ajax({
        type : 'get',
        url : '{{URL::to('drinks/sake/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
            console.log(data);
            $("#edit_modal .modal_content input[name='product_id']").val(data.product.product_id),
            $("#edit_modal .modal_content input[name='name']").val(data.product.name),
            $("#edit_modal .modal_content input[name='price']").val(data.product.price),
            $("#edit_modal .modal_content input[name='production_area']").val(data.product.production_area), 
            $("#edit_modal .modal_content input[name='description']").val(data.product.description); 
            $("#edit_modal .modal_content input[name='description2']").val(data.product.description2); 
            if(data.product.category_id == 38)
            {
                $("#edit_modal .modal_content .hide_when_flight").hide(),
                $("#edit_modal .modal_content input[name='production_area']").attr("placeholder", "Amount e.g.(6 oz tokkuri)");   
            }else
            {
                $("#edit_modal .modal_content .hide_when_flight").show(),
                $("#edit_modal .modal_content input[name='production_area']").attr("placeholder", "Production Area e.g.(Nagano)"),
                $("#edit_modal .modal_content input[name='grade']").val(data.sake.grade),
                $("#edit_modal .modal_content input[name='rice']").val(data.sake.rice),
                $("#edit_modal .modal_content select[name='sweetness']").val(data.sake.sweetness);
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
        }
    });

    $("#edit_modal .modal_content input[name='size_checkbox']").change(function(){
        if(this.checked)
            $('#edit_modal .modal_content .bottle_size_hide').fadeIn('slow');
        else
            $('#edit_modal .modal_content .bottle_size_hide').fadeOut('slow');
    });

    $("#edit_modal .modal_content select[name='sweetness']").change(function(){
        if($(this).children("option").filter(":selected").text() == 'Other')
            $('#edit_modal .modal_content .sweetness_hide').fadeIn('slow');
        else
            $('#edit_modal .modal_content .sweetness_hide').fadeOut('slow');
    });
});

$('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('drinks/{sake}/edit')}}',
        data: {'product_id': $("#edit_form input[name='product_id']").val(),
                'name': $("#edit_form input[name='name']").val(),
                'price': $("#edit_form input[name='price']").val(),
                'production_area': $("#edit_form input[name='production_area']").val(),
                'rice': $("#edit_form input[name='rice']").val(),
                'sweetness': $("#edit_form input[name='sweetness']").val(),
                'description': $("#edit_form input[name='description']").val(),
                'description2': $("#edit_form input[name='description2']").val(),
                'submit': $("#edit_form input[name='submit']").val()
        }
    });
});


</script>

@endsection


