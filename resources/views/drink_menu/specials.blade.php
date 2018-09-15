@extends('layouts.header_drink')

@section('content')
<div id='add_new_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_add_new_tab' onclick='hide_add_new_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'special_add_new']) !!}
        {!! Form::hidden('category_id') !!}
        @include('layouts.form_special_new')
        {!! Form::close() !!}
    </div>
 </div>

 <div id='edit_modal' class='modal'>
    <div class='modal_content'>
        <!-- <button id='close_edit_tab' onclick='hide_edit_div()'>X</button> -->
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'special_edit_submit']) !!}
        {!! Form::hidden('product_id') !!}
        @include('layouts.form_special_edit')
        {!! Form::close() !!}
    </div>    
 </div>

<div id="container">
    <div id="menu">        
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
        <h1 class="specials_title">Current Specials</h1>
        <p>limited bottles available</p>

        @foreach($categories as $category)
            <!-- @if($category->category == 'Sake' && $category->description == 'specials')
                <h2 id="sake_by_glass">
                {{ $category->category }}
            @elseif($category->category == 'Sparkling' && $category->description == 'specials')
                <h2 id="sake_bottles">
                {{ $category->category }}
            @elseif($category->category == 'White' && $category->description == 'specials')
                <h2 id="sake_bottles">
                {{ $category->category }}
            @elseif($category->category == 'Red' && $category->description == 'specials')
                <h2 id="sake_bottles">
                {{ $category->category }}
            @elseif($category->category == 'Dessert' && $category->description == 'specials')
                <h2 id="sake_bottles">
                {{ $category->category }}
            @elseif($category->category == 'Whisky' && $category->description == 'specials')
                <h2 id="sake_bottles">
                {{ $category->category }}
            @endif
                </h2> -->
            <div id="" class="drink_categories" data-id="{{ $category->category_id }}" data-category="{{ $category->category }}">
                <h2 style="color: #CF671F; clear:both">{{ $category->category }}</h2>
                <a class="add_new_drink"> <img class="add_drinks" src='images/add_icon_active.png'></a>
                <hr>
                    @foreach($drinks as $drink)
                        @if($drink->category->category == $category->category)
                        <div class="products">
                            <a class="edit" data-id="{{ $drink->product_id }}"><img class="edit_drinks" src='images/edit_icon_active.png'></a>
                            <div>
                                <p class="drink_name">{{ $drink->name }} 
                                <p class="drink_price">{{ $drink->price }}</p> 

                                <div class="drink_details"> 
                                    <p>{{ $drink->description }}</p>
                                    <p>{{ $drink->production_area }}</p> 
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
        url : '{{URL::to('special/edit')}}',
        data:{'product_id':$(this).data('id')},
        success:function(data){
            console.log(data);
                $("#edit_modal .modal_content input[name='product_id']").val(data.product_id),
                $("#edit_modal .modal_content input[name='name']").val(data.name),
                $("#edit_modal .modal_content input[name='price']").val(data.price),
                $("#edit_modal .modal_content input[name='production_area']").val(data.production_area),
                $("#edit_modal .modal_content input[name='description']").val(data.description);
                }
            });
    });

$('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('special/edit')}}',
        data: {'product_id': $("#edit_form input[name='product_id']").val(),
                'name': $("#edit_form input[name='name']").val(),
                'price': $("#edit_form input[name='price']").val(),
                'production_area': $("#edit_form input[name='production_area']").val(),
                'description': $("#edit_form input[name='description']").val(),
                'submit': $("#edit_form input[name='submit']").val()
        }
    });
});


</script>

@endsection


