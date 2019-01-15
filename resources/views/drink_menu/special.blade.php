@extends('layouts.header')

@section('title', 'Specials')

@section('content')


<!-- 1/12/19 Need to correct form for this page         -->
<!-- 1/14/19 Wine and shochu queries in show controller         -->
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
                    <div class="drink_categories">
                @endif
                <div class="products">
                    <a class="edit" data-id="{{ $product->product_id }}"><img class="edit_drinks" src='../images/edit_icon_active.png'></a>
                        <div>
                            <p class="drink_name">
                                {{ $product->name }} 
                                <small style="font-style: italic;">{{ $product->grade }}</small>    
                                <small style="font-style: italic;">{{ $product->type }}</small>
                                @if($product->category == 'SHOCHU 焼酎' || $product->category == 'JAPANESE WHISKY ウイスキー')   
                                <small style="font-style: italic;">{{ $product->description2 }}</small> 
                                <span style="color: #CF671F;">{{ $product->production_area }}</span>
                                @endif
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
                                    @if($product->category != 'SHOCHU 焼酎' && $product->category != 'JAPANESE WHISKY ウイスキー')
                                    {{ $product->production_area }}  
                                    @endif
                                    @if(!empty ($product->rice))            
                                        / {{ $product->rice }} / {{ $product->sweetness }}
                                    @endif
                                    @if(!empty ($product->year))    
                                        @if($product->year) 
                                            <span>{{ $product->year }}</span>
                                        @endif
                                    @endif
                                </p>
                                <p>{{ $product->description }}</p>
                                @if($product->category != 'SHOCHU 焼酎' && $product->category != 'JAPANESE WHISKY ウイスキー')
                                <span>{{ $product->description2 }}</span>
                                @endif
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
                @if($loop->last)
                    </div>
                @endif
            @endforeach<!--$category as $products -->
        @endforeach<!--$category_array as $category -->

        <div class="hh">
            <h1>Happy Hour</h1>
            <div>
                <p>1/2 Price Bottles of Sake and Wine</p>
                <p>5-6 PM Everyday</p>
                <p>$100 and under</p>
            </div>
            <div>
                <p>Excluedes large format bottles</p>
                <p>Multiple bottles ok, but one at a time</p>
                <p>Not valid with other promotions and during special events or holidays</p>
            </div>
        </div>

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

$(document).on("click", ".add_new_drink", function(event){   
    $('#add_new_modal').css('display', 'block');

    const modal = $("#add_new_modal .modal_content");
    modal.find("input[name='category_id']").val($(this).parent().data("id"));

    modal.find("input[name='category_name']")
        .val($(this).parent().data("category"))
        .css("color", "red"); 
    
    modal.find("input[name='category_desc']")
        .val($(this).prev().text()); 
    
    modal.find ("input[name='category_id']")
        .val($(this).parent().data("id"));

    modal.find(".form_category")
        .text($(this).parent().data("category")); 

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

//Edit Modal
$(document).on("click", ".edit", function(event){   
    $('#edit_modal').css('display', 'block');
    $.ajax({
        type : 'get',
        url : '{{URL::to('drinks/special/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
            console.log(data);
                $("#edit_modal .modal_content input[name='product_id']").val(data.product_id),
                $("#edit_modal .modal_content input[name='name']").val(data.name),
                $("#edit_modal .modal_content input[name='price']").val(data.price),
                $("#edit_modal .modal_content input[name='production_area']").val(data.production_area),
                $("#edit_modal .modal_content input[name='description']").val(data.description),
                $("#edit_modal .modal_content input[name='description2']").val(data.description2);
                }
            });
    });

$('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('drinks/special/edit')}}',
        data: {'product_id': $("#edit_form input[name='product_id']").val(),
                'name': $("#edit_form input[name='name']").val(),
                'price': $("#edit_form input[name='price']").val(),
                'production_area': $("#edit_form input[name='production_area']").val(),
                'description': $("#edit_form input[name='description']").val(),
                'description2': $("#edit_form input[name='description2']").val(),
                'submit': $("#edit_form input[name='submit']").val()
        }
    });
});


</script>

@endsection


