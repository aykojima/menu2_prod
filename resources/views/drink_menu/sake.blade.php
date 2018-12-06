@extends('layouts.header')

@section('title', 'Sake')

@section('content')
<div id='add_new_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_add_new_tab' onclick='hide_add_new_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'sake_add_new']) !!}
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
        {!! Form::open(['route' => 'sake_edit_submit']) !!}
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
        <div id="sake_by_glass" class='title_div'>
            <h1 class="title">SAKE BY THE GLASS</h1>
            <p>Region / Rice / SMV</p>
            <p>6 oz tokkuri</p>
        </div>
        @elseif($key == 6)
        <div id="sake_bottles" class='title_div margin_top'>
            <h1 class="title">SAKE BOTTLES</h1>
            <p>Region / Rice / SMV</p>
            <p>720ml Bottle</p>
        </div>
        @endif
        </h1>
        @if($category->category_id != 6 && $category->category_id != 12 && $category->category_id != 14)
            <div id="" class="drink_categories" data-id="{{ $category->category_id }}" data-category="{{ $category->category }}">
                <p style="color: #CF671F; clear:both">{{ $category->category }}</p>
                <p style="color: #ccc; font-size: 0.8em;">{{ $category->description }}</p>
                <a class="add_new_drink"> 
                    <img class="add_drinks" src='images/add_icon_active.png'>
                </a>
                <hr>
                @foreach($sake_glasses as $sake_glass)
                    @if($sake_glass->category->category == $category->category)
                        <div class="products">
                        <a class="edit" data-id="{{ $sake_glass->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
                            <div>
                                <p class="drink_name">{{ $sake_glass->name }} 
                                @if(!empty ($sake_glass->sake))    
                                    <small>{{ $sake_glass->sake->grade }}</small>
                                    @if($key == 0)
                                        <small style="color: #CF671F">warm or hot</small>
                                    @endif
                                @endif
                                </p>
                                <p class="drink_price">{{ $sake_glass->price }}</p>
                                @if(!empty($sake_glass->sake->bottle->size))    
                                <p class="bottle_size"><small>{{ $sake_glass->sake->bottle->size }}ml</small>
                                @if($sake_glass->sake->bottle->second_price)    
                                {{ $sake_glass->sake->bottle->second_price }} / 
                                @endif
                                </p>
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
                                    @if(!empty ($sake_glass->description2) )
                                        <span class="special_description">{{ $sake_glass->description2 }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach
            </div>   
        @endif
        @if($key == 5)
        <div id="" class="drink_categories" data-id="38" data-category="SEASONAL SAKE">
            <h2>SEASONAL SAKE</h2>
            <!-- <p style="color: #ccc; font-size: 0.8em;"></p> -->
                <a class="add_new_drink"> <img class="add_drinks" src='images/add_icon_active.png'></a>
            <hr>
            @foreach($flights as $flight)
                <div class="products">
                    <a class="edit" data-id="{{ $flight->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
                        <div>
                    <p class="drink_name">{{ $flight->name }}
                        <span>( {{ $flight->production_area }} )</span>
                    </p>
                    <p class="drink_price">{{ $flight->price }}</p>
                    <div class="drink_details">
                        <p></p>
                        <p>
                        {{ $flight->description }}
                        </p>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>    
        @endif 
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
    $("#add_new_modal .modal_content input[name='category_id']").val($(this).parent().data("id"));
    
    if($(this).parent().data("id") == 38)
    {
        $("#add_new_modal .modal_content .hide_when_flight").hide();
        $("#add_new_modal .modal_content input[name='production_area']").attr("placeholder", "Amount e.g.(6 oz tokkuri)");
    }else
    {
        $("#add_new_modal .modal_content .hide_when_flight").show();
        $("#add_new_modal .modal_content input[name='production_area']").attr("placeholder", "Production Area e.g.(Nagano)");
    }
    
    $("#add_new_modal .modal_content .form_category")
        .text($(this).parent().data("category")); 
    
    $("#add_new_modal .modal_content input[name='size_checkbox']").change(function(){
        if(this.checked)
            $('#add_new_modal .modal_content .bottle_size_hide').fadeIn('slow');
        else
            $('#add_new_modal .modal_content .bottle_size_hide').fadeOut('slow');
    });

    $("#add_new_modal .modal_content select[name='sweetness']").change(function(){
        if($(this).children("option").filter(":selected").text() == 'Other')
            $('#add_new_modal .modal_content .sweetness_hide').fadeIn('slow');
        else
            $('#add_new_modal .modal_content .sweetness_hide').fadeOut('slow');
    });
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
        url : '{{URL::to('sake/edit')}}',
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


