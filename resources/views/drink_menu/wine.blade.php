@extends('layouts.header_drink')

@section('content')
<div id='add_new_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_add_new_tab' onclick='hide_add_new_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'wine_add_new']) !!}
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
        {!! Form::open(['route' => 'wine_edit_submit']) !!}
        {!! Form::hidden('product_id') !!}
        @include('layouts.forms.form_drink')
        <div class="buttons">
            <input value="Update" type="submit" name="submit">
            <input value="Delete" type="submit" name="submit">
        </div>
        {!! Form::close() !!}
    </div>    
 </div>

<div id="container">
    
    <div id="menu">        
        @foreach($categories as $key => $category)
            @if($key == 0)
                <div id="sake_bottles" class='title_div'>
                    <h1 id="wine_by_glass" class='title'>
                        WINE BY THE GLASS
                    </h1>
                    <p></p><!--need this for styling-->
                    <p>5 oz pour</p>
                </div>
            @elseif($key == 6)
                <div id="sake_bottles" class='title_div margin_top'>
                    <h1 id="wine_bottles" class='title'>
                        WINE BOTTLES
                    </h1>
                    <p></p><!--need this for styling-->
                    <p>750ml</p>
                </div>
            @endif
            <div id="" class="drink_categories" data-id="{{ $category->category_id }}" data-category="{{ $category->category }}">
                <h3 style="color: #CF671F; clear:both">{{ $category->category }}</h3>
                <p style="color: #ccc; font-size: 0.8em;">{{ $category->description }}</p>
                <a class="add_new_drink"> <img class="add_drinks" src='images/add_icon_active.png'></a>
                <hr>
            @if($key == 2)
                <p class="rotating_wine">Anything goes -- from dry Riesling to white Burgundy</p>
                <p class="rotating_wine">Ask your server about today's pour!</p>
            @endif
            @if($key == 5)
                <p class="rotating_wine">Typically bright, light varietals like Pinot Noir, Tempranillo, or Barbera. Ask your server about today's pour!</p>
            @endif
            @foreach($wine_glasses as $wine_glass)
                @if($wine_glass->category->category_id == $category->category_id)
                <div class="products">
                <a class="edit" data-id="{{ $wine_glass->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
                    <div>
                        <p class="drink_name">{{ $wine_glass->name }} 
                        @if(!empty ($wine_glass->wine))    
                            <small>{{ $wine_glass->wine->type }}</small>
                        @endif
                        </p>
                        <p class="drink_price">{{ $wine_glass->price }}</p>
                        @if(!empty ($wine_glass->wine->bottle->size))    
                            <p class="bottle_size"><small>{{ $wine_glass->wine->bottle->size }}ml</small>
                                @if($wine_glass->wine->bottle->second_price)    
                                    {{ $wine_glass->wine->bottle->second_price }} / 
                                @endif
                            </p>
                        @endif
                        <div class="drink_details">
                            <p>{{ $wine_glass->production_area }} 
                            @if(!empty ($wine_glass->wine))    
                                @if($wine_glass->wine->year) 
                                    <span>{{ $wine_glass->wine->year }}</span>
                                @endif
                            @endif    
                            </p>
                            <p>{{ $wine_glass->description }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                @endif
            @endforeach
        </div>    
       
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
    $(".drink_categories").each(function(){
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
        url : '{{URL::to('wine/edit')}}',
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
        url : '{{URL::to('wine/edit')}}',
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


