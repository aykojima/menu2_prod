@extends('layouts.header')

@section('content')

<div id='add_new_modal' class='modal'>
    <div class='modal_content'>        
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'course_add_new']) !!}
        @include('layouts.form_course')
        {!! Form::close() !!}
    </div>
 </div>

 <div id='edit_modal' class='modal'>
    <div class='modal_content'>
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'course_edit_submit']) !!}
        {!! Form::hidden('course_id') !!}
        @include('layouts.form_course')
        {!! Form::close() !!}
    </div>    
 </div>

<div id="container">
    
    <div id="menu">
        <h1 id="ippin">
            Course Meals
            <button id="new_item" class="new_section">&#43;</button>
        </h1>
        
        <div id='show_result_course'>
        @foreach($courses as $course)
            <div class="course_divs">
                <figure class="edit_circle">Edit</figure>
                <h2 id="{{ $course->course_id }}_course_title" class="course_titles" contentEditable="true" data-id="{{ $course->course_id }}" data-column="title" data-model="course" data-edible="edible">    
                    {{ $course->title }}
                </h2>
                <p class="course_prices" contentEditable="true" data-id="{{ $course->course_id }}" data-column="price" data-model="course" data-edible="edible">{{ $course->price }}</p>
                <div class="additionals">
                    @foreach($course->c_add_on_items as $add_on)
                        <p class="add_name" contentEditable="true" data-id="{{ $add_on->c_add_on_id }}" data-column="description" data-model="c_add_on_item" data-edible="edible">{{ $add_on->description }}</p>
                        <p class="add_price" contentEditable="true" data-id="{{ $add_on->c_add_on_id }}" data-column="price" data-model="c_add_on_item" data-edible="edible">{{ $add_on->price }}</p>
                    @endforeach
                    <!-- <input placeholder="additionals name" class="add_name"></input>
                    <input placeholder="$" class="add_price"></input> -->
                </div>
    
                 <div class="courses">
                     <ul>
                        @foreach($course->c_items as $item)
                            <li>
                                <p class="choices">
                                    @if ($item->choice == "Y")choice of: 
                                    @else
                                    @endif 
                                </p>
                                <div class="items">
                                    <p class="item_names" contentEditable="true" data-id="{{ $item->c_item_id }}" data-column="name" data-model="c_item" data-edible="edible">{{ $item->name }}</p>
                                    <p class="item_prices" contentEditable="true" data-id="{{ $item->c_item_id }}" data-column="price" data-model="c_item" data-edible="edible">{{ $item->price }}</p>
                                </div>
                                <div class="descriptions" contentEditable="true" data-id="{{ $item->c_item_id }}" data-column="description" data-model="c_item" data-edible="edible">
                                    {{ $item->description }}
                                </div>  
                            </li>
                         @endforeach
                         <!-- <li>
                             <input class="choices" placeholder="choice of:"></input>
                             <div class="items">
                                <input class="item_names" placeholder="Item name"></input>
                                <input class="item_prices" placeholder="$"></input>
                             </div>
                             <input class="descriptions" placeholder="Description"></input>
                         </li> -->
                     </ul>
                 </div>
             </div>

             <div id="omakase" class="courses">
                @foreach($course->c_omakases as $omakase)
                    <h3 class="name" contentEditable="true" data-id="{{ $omakase->c_omakase_id }}" data-column="name" data-model="c_omakase" data-edible="edible">{{ $omakase_name }}</h3>
                    <h3 class="price" contentEditable="true" data-id="{{ $omakase->c_omakase_id }}" data-column="price" data-model="c_omakase" data-edible="edible">{{ $omakase->om_price }}</h3>
                    <div class="additionals">
                        <p class='name' contentEditable="true" data-id="{{ $omakase->c_omakase_id }}" data-column="description" data-model="c_omakase" data-edible="edible">{{ $omakase->description }}</p>
                        <p class="price" contentEditable="true" data-id="{{ $omakase->c_omakase_id }}" data-column="desc_price" data-model="c_omakase" data-edible="edible">{{ $omakase->desc_price }}</p>
                    </div>
                @endforeach
                <!-- <input class="name" placeholder="Omakase name"></input>
                <input class="price" placeholder="Omakase price"></input>
                <div class="additionals">
                    <input class='name' placeholder="Omakase additional name"></input>
                    <input class="price" placeholder="Omakase additional price"></input>
                </div> -->
             </div>
        @endforeach
        </div>
    </div>
</div>

<script>
// $("[data-edible='edible']").hover(function(){
//     $(this).css("border", "1px #cccccc dotted");
// },
// function(){
//     $(this).css("border", "none");
// })

$(".course_divs").hover(function(){
    $(this).css("background-color", "#F5F5F5");
    $(this).find("figure").css("display", "block");
},
function(){
    $(this).css("background-color", "#ffffff");
    $(this).find("figure").css("display", "none");
})

// Add New Modal

$(document).on("click", "#new_item", function(){   
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

$(document).ready(function(){      
      var i=1, j=1; 

      $('#add_more_addons').click(function(e){  
          e.preventDefault();
           i++;  
           $('.addon_fields_wrap').append('<div class="div_column_medium">' +
                '<input type="text" name="addon_description[]" placeholder="Add-ons (e.g. Served with miso soup)"' + 
                'class="form_column_medium" />' +
                '<input type="text" name="addon_price[]" placeholder="Price"' + 
                'class="form_column_medium" />' +
                '<button type="button" name="remove" id="'+i+'" class="remove_field">&times;</button></div>');  
      });  

      $('#add_more_items').click(function(e){  
          e.preventDefault();
           j++;  
           $('.item_fields_wrap').append('<div><div id= "sustainable"><div class="div_label_checkbox">' +
                '<label for="choice">Choice of</label>' +
                '<input id="choice" type="hidden" value="N" name="choice[]"></input>' + 
                '<input id="choice" type="checkbox" value="Y" name="choice[]"></input></div></div>' + 
                '<div class="div_column_medium">' +
                '<input type="text" name="item_name[]" placeholder="Item (e.g. Sushi combo)"' + 
                'class="form_column_medium" />' +
                '<input type="text" name="item_price[]" placeholder="Price"' + 
                'class="form_column_medium" /></div>' +
                '<input type="text" name="item_description[]" placeholder="Description (e.g. Seven pieces of nigiri sushi)"' + 
                'class="form_column_long" />' +
                '<button type="button" name="remove" id="'+i+'" class="remove_field">&times;</button></div>');  
      });
      
      $(".addon_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); i--;
        });

      $(".item_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
         e.preventDefault(); $(this).parent('div').remove(); j--;
        });
});


// $("[data-edible='edible']").click(function (event) {    
//     var inline_edit = $(this),
//         current_value = $.trim(inline_edit.text()),
//         column = $(this).data('column'),
//         model = $(this).data('model'),
//         id = $(this).data('id');      
        
//     inline_edit.on("blur", function () {
//         var inline_edit = $(this),
//         new_value = $.trim(inline_edit.text());
//         $(this).trigger("contentchange", [ column, model, id, current_value, new_value ]);
//     })
//     .on("keydown", function (event) {
//         // console.log(event);
//         if (event.keyCode == 13) 
//         {
//             $(this).trigger("contentchange", [ column, model, id, current_value, new_value ]);
//         }
//     })
//     .on("contentchange", function (event, column, model, id, current_value, new_value) {
//         //.on("contentchange", function () { 
//         var me = $(this);
//         event.preventDefault();
        
//         if ( me.data('requestRunning') ) {
//             return;
//         }

//         me.data('requestRunning', true);

//         if (new_value === current_value) {
//             $inline_edit
//                 .text(current_value);
//                 // .removeClass('ajax');
//         }else 
//         {
//             edit_contents({
//                 column: column, 
//                 model: model, 
//                 id: id,
//                 contents: new_value
//             }).done(function (data) {
//                 //console.log(data);
//                 $inline_edit.text(data);
//             }).complete(function (){
//                 me.data('requestRunning', false);
//             }).fail(function () {
//                 $inline_edit.text(current_value);
//             });
//         }
//     })
//     .focus();
// });

// function edit_contents(params) {
//     console.log(params);
//     return $.ajax({
//         url: '{{ URL::to('course/edit') }}',
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         },
//         type: "post",
//         data: params,
//     }).fail(function(xhr, status, error) {
//         console.warn(xhr.responseText);
//         alert(error);
//     });
// }
  </script>

@endsection


