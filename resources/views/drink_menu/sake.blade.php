@extends('layouts.header')

@section('title', 'Sake')

@section('content')

<div id="container">
    <div id="menu">
        @foreach($category_array as $category)
            @foreach($category as $product)
                @if(in_array($product->title_id, $titles))
                    <div class='title_div' data-title="{{ $product->title_id }}">
                        <h1 class="title">{{ $product->title_name}}</h1>
                        <p>{{ $product->title_description}}</p>
                        <p>{{ $product->title_size}}</p>
                        <a class="add_new_category">
                            <img class="add_drinks" src='../images/add_icon_active.png'>
                        </a>
                    </div>
                    
                @endif  
                @if ($loop->first)
                    <div id="" class="drink_title" data-id="{{ $product->category_id }}" data-category="{{ $product->category }}">
                        <p style="color: #CF671F; clear:both">{{ $product->category }}</p>
                        <p style="color: #ccc; font-size: 0.8em; padding-top: 2%;">{{ $product->category_description }}</p>
                        <a class="edit_category" data-category="{{ $product->category_id }}">
                            <img class="edit_drinks" src='../images/edit_icon_active.png'>
                        </a>
                        <a class="add_new_drink">
                            <img class="add_drinks" src='../images/add_icon_active.png'>
                        </a>
                         
                    </div>
                    <hr>
                @endif
                <div class="products">
                    <a class="edit" data-category="{{ $product->category_id }}" data-id="{{ $product->product_id }}"><img class="edit_drinks" src='../images/edit_icon_active.png'></a>
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

const new_modal = $("#add_new_modal .modal_content");

$(document).on("click", ".add_new_category", function(event){
    $('#add_new_modal').css('display', 'block');
    new_modal.find("input[name='title_id']").val($(this).parent().data("title"));
    new_modal.find(".new_drink_form").hide();
    new_modal.find(".category_form").show();
    new_modal.find(".buttons .category_form").hide();
    new_modal.find(".add_new_category_form").show();
    new_modal.find("input[name='category_name']").attr("placeholder", "Category Name");
    new_modal.find("input[name='category_desc']").attr("placeholder", "Category Description");


});

$(document).on("click", ".add_new_drink", function(event){
    $('#add_new_modal').css('display', 'block');

    new_modal.find(".category_form").hide();
    new_modal.find(".new_drink_form").show();
    new_modal.find(".add_new_category_form").hide();
    new_modal.find("input[name='category_id']").val($(this).parent().data("id"));

    if($(this).data("category") == 38)
    {
        new_modal.find(".hide_when_flight").hide();
        new_modal.find("input[name='production_area']").attr("placeholder", "Amount e.g.(6 oz tokkuri)");
    }else
    {
        new_modal.find(".hide_when_flight").show();
        new_modal.find("input[name='production_area']").attr("placeholder", "Production Area e.g.(Nagano)");
    }
    
    new_modal.find("input[name='size_checkbox']").change(function(){
        if(this.checked)
            new_modal.find(" .bottle_size_hide").fadeIn('slow');
        else
            new_modal.find(" .bottle_size_hide").fadeOut('slow');
    });

    new_modal.find("select[name='sweetness']").change(function(){
        if($(this).children("option").filter(":selected").text() == 'Other')
            new_modal.find(" .sweetness_hide").fadeIn('slow');
        else
            new_modal.find(" .sweetness_hide").fadeOut('slow');
    });
});

$(document).on("click", ".edit_category", function(event){
    $('#add_new_modal').css('display', 'block');
    new_modal.find(".new_drink_form").hide();
    new_modal.find(".category_form").show();
    new_modal.find(".add_new_category_form").hide();
    new_modal.find("input[name='category_id']").val($(this).parent().data("id"));

    new_modal.find("input[name='category_name']")
        .val($(this).parent().data("category"))
        .css("color", "red"); 
    
    new_modal.find("input[name='category_desc']")
        .val($(this).prev().text());
     

});
//Edit Modal
$(document).on("click", ".edit", function(event){   
    $('#edit_modal').css('display', 'block');
    let modal = $("#edit_modal .modal_content");
    $.ajax({
        type : 'get',
        url : '{{URL::to('drinks/sake/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
        console.log(data);            
            modal.find("input[name='product_id']").val(data.product.product_id),
            modal.find("input[name='name']").val(data.product.name),
            modal.find("input[name='price']").val(data.product.price),
            modal.find("input[name='production_area']").val(data.product.production_area), 
            modal.find("input[name='description']").val(data.product.description); 
            modal.find("input[name='description2']").val(data.product.description2); 
            if(data.product.category_id == 38)
            {
                modal.find(".hide_when_flight").hide(),
                modal.find("input[name='production_area']").attr("placeholder", "Amount e.g.(6 oz tokkuri)");   
            }else
            {
                modal.find(".hide_when_flight").show(),
                modal.find("input[name='production_area']").attr("placeholder", "Production Area e.g.(Nagano)"),
                modal.find("input[name='grade']").val(data.sake.grade),
                modal.find("input[name='rice']").val(data.sake.rice),
                modal.find("select[name='sweetness']").val(data.sake.sweetness);
                if(data.bottle){
                    modal.find('.bottle_size_hide').show(),
                    modal.find("input[name='size_checkbox']").prop('checked', true),
                    modal.find("input[name='size']").val(data.bottle.size);
                    if(data.bottle.second_price){
                        modal.find("input[name='second_price']").val(data.bottle.second_price);
                    }
                }else{
                    modal.find('.bottle_size_hide').hide(),
                    modal.find("input[name='size_checkbox']").prop('checked', false),
                    modal.find("input[name='size']").val('');
                }
            }
        }
    });

    modal.find("input[name='size_checkbox']").change(function(){
        if(this.checked)
            modal.find('.bottle_size_hide').fadeIn('slow');
        else
            modal.find('.bottle_size_hide').fadeOut('slow');
    });

    modal.find("select[name='sweetness']").change(function(){
        if($(this).children("option").filter(":selected").text() == 'Other')
            modal.find('.sweetness_hide').fadeIn('slow');
        else
            modal.find('.sweetness_hide').fadeOut('slow');
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


