@extends('layouts.header')

@section('title', $page)

@section('content')

<div id='add_new_modal' class='modal'>
        <div class='modal_content'>
            <span class="close">&times;</span>
            {!! Form::open(array('action' => array('drink_controller@add_new', $page))) !!}
            
            {!! Form::hidden('category_id') !!}
            <div class="category_form">
                {!! Form::hidden('title_id') !!}
                {!! Form::text('category_name', null, ['placeholder' => 'Category Name', 'class' => 'form_column_long']) !!}
                {!! Form::text('category_desc', null, ['placeholder' => 'Category Description', 'class' => 'form_column_long']) !!}
                <label>Page number</label>
                    {!! Form::select('page_id', 
                        array(0 => 'Left side / Cocktails, Beer, & Non-Alcoholic', 1 => '1 (Inside / Sake by the Glass)', 2 => '2 (Inside / Sake Bottles)', 
                        3 =>'3 (Inside / Sake Bottles)', 4 => '4 (Inside / Wine by the Glass)', 5 => '5 (Inside / Wine Bottles)', 
                        6 => '6 (Inside / Japanese Whisky)', 7 => '7 (Inside / Shochu & Spirits)', 
                        -1 => 'right side / Specials' )) !!}
            </div>
            <div class="new_drink_form">
                @include('layouts.forms.form_drink')
            </div>
            <!-- {!! Form::submit('Save') !!} -->
            <div class="buttons">
                <div class="new_drink_form">
                    <input value="Save" type="submit" name="submit">
                </div>
                <div class="add_new_category_form">
                    <input value="Create" type="submit" name="submit">
                </div>
                <div class="category_form">
                    <input value="Update" type="submit" name="submit">
                    <input value="Delete" type="submit" name="submit">
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div id='edit_modal' class='modal'>
        <div class='modal_content'>
            <!-- <button id='close_edit_tab' onclick='hide_edit_div()'>X</button> -->
            <span class="close">&times;</span>
            {!! Form::open(array('action' => array('drink_controller@edit_menu', $page))) !!}            
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
                    <div id="" class="drink_title" data-id="{{ $product->category_id }}" data-category="{{ $product->category }}" data-page_number="{{ $product->page_number }}">
                    @if($product->title_name != $product->category)
                        <p style="color: #CF671F; clear:both">{{ $product->category }}</p>
                    @endif
                        <p style="color: #ccc; font-size: 0.8em; padding-top: 2%;">{{ $product->category_description }}</p>
                        <a class="edit_category" data-category="{{ $product->category_id }}">
                            <img class="edit_drinks" src='../images/edit_icon_active.png'>
                        </a>
                        <a class="add_new_drink">
                            <img class="add_drinks" src='../images/add_icon_active.png'>
                        </a>
                         
                    </div>
                    <hr>
                    <div class="drink_categories">
                @endif
                <div class="products">
                    <a class="edit" action="{{ URL::action('drink_controller@show_edit_form', $page) }}" data-category="{{ $product->category_id }}" data-id="{{ $product->product_id }}">
                        <img class="edit_drinks" src='../images/edit_icon_active.png'>
                    </a>
                    <div>
                        <p class="drink_name">
                            {{ $product->name }} 
                            <small style="font-style: italic;">{{ $product->grade }}</small>
                            <small style="font-style: italic;">{{ $product->type }}</small>
                            @if($page == 'shochu')   
                                <small style="font-style: italic;">{{ $product->description2 }}</small> 
                                <span style="color: #CF671F;">{{ $product->production_area }}</span>
                            @elseif($page == 'special')   
                                <span style="color: #CF671F;">{{ $product->description }}</span>
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
                                @if($page != 'shochu')
                                    {{ $product->production_area }}  
                                @endif
                                @if(!empty ($product->rice))            
                                    / {{ $product->rice }} 
                                @endif
                                @if(!empty ($product->sweetness))       
                                    / {{ $product->sweetness }}
                                @endif
                                @if($product->year)    
                                    <span>/ {{ $product->year }}</span>
                                @endif
                            </p>
                            @if($page != 'special')
                                <p>{{ $product->description }}</p>
                            @endif
                            @if($page == 'special')
                                <p>{{ $product->description2 }}</p>
                            @endif
                            @if($page != 'shochu' && $page != 'special')
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
                @if ($loop->last)
                    </div>
                @endif
            @endforeach<!--$category as $products -->
        @endforeach<!--$category_array as $category -->
        @if(Request::is('drinks/special'))
        <div class="hh">
            <h1>Happy Hour</h1>
            <div>
                <p>1/2 Price Bottles of Sake and Wine</p>
                <p>5-6 PM Everyday</p>
                <p>$100 and under</p>
            </div>
            <div>
                <p>Some restrictions apply. Ask your server for details!</p>

            
            </div>
        </div>
        @endif
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
     
    new_modal.find("select[name='page_id']")
        .val($(this).parent().data("page_number"));

});

const path_array = window.location.pathname.split('/');
const page = path_array[4];

console.log(page);
//Edit Modal
$(document).on("click", ".edit", function(event){   
    $('#edit_modal').css('display', 'block');
    let modal = $("#edit_modal .modal_content");
    var url = $(this).attr("action"); 
    $.ajax({
        type : 'get',
        url: url, 
        data:{'product_id':$(this).data('id')},
        success:function(data){
        // console.log(data);            
            modal.find("input[name='product_id']").val(data.product.product_id),
            modal.find("input[name='name']").val(data.product.name),
            modal.find("input[name='price']").val(data.product.price),
            modal.find("input[name='production_area']").val(data.product.production_area), 
            modal.find("input[name='description']").val(data.product.description),
            modal.find("input[name='description2']").val(data.product.description2); 
            if(data.product.category_id == 38)
            {
                modal.find(".hide_when_flight").hide(),
                modal.find("input[name='production_area']").attr("placeholder", "Amount e.g.(6 oz tokkuri)");   
            }else
            {
                modal.find(".hide_when_flight").show(),
                modal.find("input[name='production_area']").attr("placeholder", "Production Area e.g.(Nagano)");
                if(data.wine){
                    modal.find("input[name='type']").val(data.wine.type),
                    modal.find("input[name='year']").val(data.wine.year);
                }else if(data.sake){
                    modal.find("input[name='grade']").val(data.sake.grade),
                    modal.find("input[name='rice']").val(data.sake.rice),
                    modal.find("select[name='sweetness']").val(data.sake.sweetness);
                }
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


$(document).ready(function(){
    //Styling page
    const number_of_products = document.querySelectorAll('.products').length;
    const number_of_categories = document.querySelectorAll('.drink_title').length;    

    if(page == 'cocktail'){
        console.log(number_of_products);
        if(number_of_products >=26){
            $('.products').addClass('no_padding_no_margin');
            $('.drink_title').addClass('no_padding_no_margin');
            $('.drink_name').addClass('no_padding_no_margin');
            $('.drink_price').addClass('no_padding_no_margin');
        }else if(number_of_products >=23){
            $('.drink_name').addClass('no_padding_no_margin');
            $('.drink_price').addClass('no_padding_no_margin');
            $('.products').addClass('small_margin');
            $('.drink_title').addClass('no_padding_no_margin');
        }else if(number_of_products >=20){
            $('.products').addClass('small_margin');
        }
    }else if(page == 'special'){
    // const number_of_products = document.querySelectorAll('.products').length;
    console.log(number_of_products);
    console.log(number_of_categories);
    if(number_of_categories >= 5){
        if(number_of_products >= 19){
            $('.products').addClass('no_padding_no_margin');
            $('.drink_title').addClass('no_padding_no_margin');
            $('.drink_name').addClass('no_padding_no_margin');
            $('.drink_price').addClass('no_padding_no_margin');
        }else if(number_of_products >=16){
            $('.products').addClass('no_padding_no_margin');
            $('.drink_title').addClass('no_padding_no_margin');
            $('.drink_name').addClass('no_padding_no_margin');
            $('.drink_price').addClass('no_padding_no_margin');
            $('.hh').addClass('big_margin_top');
        }else if(number_of_products >=10){
            $( "<br>" ).insertBefore( ".drink_name span" );
            $('.drink_title').addClass('big_font');
            $('.drink_name').addClass('big_font');
            $('.drink_details').addClass('bigger_font');
            $('.hh').addClass('big_margin_top');
        }else if(number_of_products >=7){
            $( "<br>" ).insertBefore( ".drink_name span" );
            $('.drink_title').addClass('big_font');
            $('.drink_name').addClass('big_font');
            $('.drink_details').addClass('bigger_font');
            $('.hh').addClass('big_margin_top');
            $('.title_div').addClass('big_margin_top big_margin_bottom');
        }
    }else if(number_of_categories >= 2){
        if(number_of_products >= 19){
            $('.products').addClass('no_padding_no_margin');
            $('.drink_title').addClass('no_padding_no_margin');
            $('.drink_name').addClass('no_padding_no_margin');
            $('.drink_price').addClass('no_padding_no_margin');
        }else if(number_of_products >=16){
            $('.products').addClass('no_padding_no_margin');
            $('.drink_title').addClass('no_padding_no_margin');
            $('.drink_name').addClass('no_padding_no_margin');
            $('.drink_price').addClass('no_padding_no_margin');
            $('.title_div').addClass('big_margin_bottom');
            $('.hh').addClass('big_margin_top');
        }else if(number_of_products >=14){
            $('.drink_title').addClass('big_font');
            $('.hh').addClass('big_margin_top');
        }else if(number_of_products >=11){
            $( "<br>" ).insertBefore( ".drink_name span" );
            $('.drink_title').addClass('big_font');
            $('.hh').addClass('big_margin_top');
            
        }else if(number_of_products >=10){
            $( "<br>" ).insertBefore( ".drink_name span" );
            $('.drink_title').addClass('big_font');
            $('.drink_name').addClass('big_font');
            $('.drink_details').addClass('bigger_font');
            $('.hh').addClass('big_margin_top');
            $('.title_div').addClass('big_margin_bottom');
        }else if(number_of_products >=5){
            $( "<br>" ).insertBefore( ".drink_name span" );
            $('.drink_title').addClass('big_font');
            $('.drink_name').addClass('big_font');
            $('.drink_details').addClass('bigger_font');
            $('.hh').addClass('big_margin_top');
            $('.title_div').addClass('big_margin_top big_margin_bottom');
        }
    }
}
});

if(page == 'cocktail'){
    $('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
        //var form_data = $('#edit_form').serialize();
            $.ajax({
            type: 'patch',
            url : '{{URL::to('drinks/{cocktail}/edit')}}',
            data: {'product_id': $("#edit_form input[name='product_id']").val(),
                    'name': $("#edit_form input[name='name']").val(),
                    'price': $("#edit_form input[name='price']").val(),
                    'description': $("#edit_form input[name='description']").val(),
                    'submit': $("#edit_form input[name='submit']").val()
            }
        });
    });
}else if(page == 'sake'){
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
}else if(page == 'wine'){
    $('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('drinks/{wine}/edit')}}',
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
}else if(page == 'shochu'){
    $('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'post',
        url : '{{URL::to('drinks/{shochu}/edit')}}',
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
}else if(page == 'special'){
// console.log("ready in special!");
    $('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
    //var form_data = $('#edit_form').serialize();
        $.ajax({
        type: 'patch',
        url : '{{URL::to('drinks/{special}/edit')}}',
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
    
}
</script>

@endsection


