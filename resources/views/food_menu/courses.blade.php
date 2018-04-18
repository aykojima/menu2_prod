@extends('layouts.header')

@section('content')

<div id='add_new_modal' class='modal'>
    <div class='modal_content'>        
        <span class="close">&times;</span>
        {!! Form::open(['route' => 'course_add_new']) !!}
        @include('layouts.form_course_new')
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
                <figure class="edit_circle" data-id="{{ $course->course_id }}"><a href="{{action('course_controller@show_edit_form', $course['course_id'])}}" target="_blank">Edit</a></figure>
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

// Add New Modal
$(document).ready(function(){      
    $(document).on("click", "#new_item", function(){   
        $('#add_new_modal').css('display', 'block');
            $('#add_new_modal .modal_content form .addon_fields_wrap > div').not(':first').remove();
            $("#add_new_modal .modal_content form input[name='edit_c_add_on_id[]']").remove();
            $('#add_new_modal .modal_content form .item_fields_wrap > div').not(':first').remove();   
    });

    $(document).on("click", "#show_description_box", function(e){
        e.preventDefault();
            $(this).next().css('display', 'block');
            $(this).css('display', 'none');
            $('.remove_description_field').css('display', 'block');
    });

    
    var i=0, j=0; 

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
           $('.item_fields_wrap').append('<div><div class="div_choice"><div class="div_label_checkbox">' +
                '<label for="choice">Choice of</label>' +
                '<input id="choice" type="hidden" value="N" name="choice[' + j + ']"></input>' + 
                '<input id="choice" type="checkbox" value="Y" name="choice[' + j + ']"></input></div></div>' + 
                '<div class="div_column_medium">' +
                '<input type="text" name="item_name[]" placeholder="Item (e.g. Sushi combo)"' + 
                'class="form_column_medium" />' +
                '<input type="text" name="item_price[]" placeholder="Price"' + 
                'class="form_column_medium" /></div>' +
                '<button id="show_description_box" class="new_section">&#43;' +
                '<span class="new_section_text">Add description</span></button>' +
                '<textarea rows="1" placeholder="Description (e.g. Seven pieces of nigiri sushi)" class="form_column_long" name="item_description[]"></textarea>' + 
                '<button type="button" name="remove_description" class="remove_description_field">&times;</button>' +
                '<button type="button" name="remove" id="'+i+'" class="remove_field">&times;</button></div>');  
      });

        $(".item_fields_wrap").on("click", ".remove_description_field", function(e){
            e.preventDefault();
            $(this).css('display', 'none');
            $(this).prev().css('display', 'none');
            $(this).prev().prev().css('display', 'block');
        });

      $(".addon_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); i--;
        });

      $(".item_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
         e.preventDefault(); $(this).parent('div').remove(); j--;
        });
    //   $("input[value='save']").click(function(e){  
    //      e.preventDefault();
    //      $('.choice_checkbox').append('<input id="choice" type="checkbox" value="N" name="choice[]">');
    //     })
    $(window).click(function(event) {
        if (event.target == $('#add_new_modal')[0]) {
            $('#add_new_modal').css('display', 'none');
            $('#add_new_modal .modal_content form .addon_fields_wrap > div').not(':first').remove();
            $('#add_new_modal .modal_content form .item_fields_wrap > div').not(':first').remove();
            i=0; j=0;
        }
    }); 

    $(document).on("click", "#add_new_modal .modal_content .close", function(){
        $('#add_new_modal').css('display', 'none');
        $('#add_new_modal .modal_content form .addon_fields_wrap > div').not(':first').remove();
        $('#add_new_modal .modal_content form .item_fields_wrap > div').not(':first').remove();
        i=0; j=0; 
    });        
});


//Edit Modal
$(document).ready(function(){      
    $(".course_divs").hover(function(){
        $(this).css("background-color", "#F5F5F5");
        $(this).find("figure").css("display", "block");
    },
    function(){
        $(this).css("background-color", "#ffffff");
        $(this).find("figure").css("display", "none");
    })

    $(document).on("click", ".edit_circle", function(event){   
        
        $('#edit_modal').css('display', 'block');
        // console.log($(this).data('id'));
        $.ajax({
            type : 'get',
            url : '{{URL::to('course/edit')}}',
            data:{'course_id':$(this).data('id')},
            success:function(data){
                
                $("#edit_modal .modal_content input[name='edit_title']").val(data.course.title);
                $("#edit_modal .modal_content input[name='edit_course_id']").val(data.course.course_id);
                var i=0, j=0;

                $(data.course.c_add_on_items).each(function( index ) {
                    $("#edit_modal .modal_content input[name='course_id']").val(this.course_id);
                    if(index == 0)
                    {
                        $("#edit_modal .modal_content input[name='edit_addon_description[]']").val(this.description);
                        $("#edit_modal .modal_content input[name='edit_addon_price[]']").val(this.price);
                        $("#edit_modal .modal_content input[name='edit_c_add_on_id[]']").val(this.c_add_on_id);
                        
                    }
                    else
                    {
                        i++;  
                        $('.addon_fields_wrap').append('<input type="hidden" name="edit_c_add_on_id[]" value="' + this.c_add_on_id + '">' + 
                        '<div class="div_column_medium">' +
                        '<input type="text" name="edit_addon_description[]" value="' + this.description + '" ' + 
                        'class="form_column_medium" />' +
                        '<input type="text" name="edit_addon_price[]" placeholder="Price" value="' + this.price + '"' + 
                        'class="form_column_medium" />'); 
                        
                        if(this.price === null)
                        {
                            $("input[name='edit_addon_price[]']").val(this.price);
                        }
                        var div= i + 1;
                        $('.addon_fields_wrap .div_column_medium:nth-child(' + div + ')').append('<button type="button" name="edit_remove" id="'+i+'" class="remove_field">&times;</button></div>');  
                        
                    }
                    
                });

                $(data.course.c_items).each(function( index ) {
                    
                    if(index == 0)
                    {
                        $("#edit_modal .modal_content input[name='edit_item_name[]']").val(this.name);
                        $("#edit_modal .modal_content input[name='edit_item_price[]']").val(this.price);
                        $("#edit_modal .modal_content input[name='edit_item_description[]']").val(this.description);
                        $("#edit_modal .modal_content input[name='edit_c_item_id[]']").val(this.c_item_id);
                        this.choice == 'Y' ? $("#edit_modal .modal_content input[name='edit_choice[" + index + "]']").prop('checked', true) : $("#edit_modal .modal_content input[name='edit_choice[" + index + "]']").prop('checked', false);
                    }
                    else
                    {
                        j++;  
                    
                        $('.item_fields_wrap').append('<div><input type="hidden" name="edit_c_item_id[]" value="' + this.c_item_id + '">' +
                        '<div class="div_choice"><div class="div_label_checkbox">' +
                        '<label for="choice">Choice of</label>' +
                        '<input id="choice" type="hidden" value="N" name="edit_choice[' + j + ']"></input>' + 
                        '<input id="choice" type="checkbox" value="Y" name="edit_choice[' + j + ']"></input></div></div>' + 
                        '<div class="div_column_medium">' +
                        '<input type="text" name="edit_item_name[]" value="' + this.name + '"' + 
                        'class="form_column_medium" />' +
                        '<input type="text" name="edit_item_price[]" placeholder="Price" value="' + this.price + '"' + 
                        'class="form_column_medium" /></div>' +
                        '<input type="text" name="edit_item_description[]" value="' + this.description + '"' + 
                        'class="form_column_long" />');
                        
                        this.choice == 'Y' ? $("#edit_modal .modal_content input[name='edit_choice[" + index + "]']").prop('checked', true) : $("#edit_modal .modal_content input[name='edit_choice[" + index + "]']").prop('checked', false);    
                        if(this.price === null)
                        {
                            $("input[name='edit_item_price[]']").val(this.price);
                        }
                        var div= j + 1;
                        $('.item_fields_wrap > div:nth-child(' + div + ')').append('<button type="button" name="edit_remove" id="'+j+'" class="remove_field">&times;</button></div>');  
                    }
                });  
                
            }
        });
        $("#edit_modal .modal_content form .addon_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); i--;
        });

        $("#edit_modal .modal_content form .item_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); j--;
        });

        $(window).click(function(event) {
            if (event.target == $('#edit_modal')[0]) {
                
                $('#edit_modal').css('display', 'none');
                        $('#edit_modal .modal_content form .addon_fields_wrap > div').not(':first').remove();
                        $('#edit_modal .modal_content form .item_fields_wrap > div').not(':first').remove();
                        
                        i=0; j=0;
                     }
        });

        $(document).on("click", "#edit_modal .modal_content .close", function(){
            $('#edit_modal').css('display', 'none');
            $('#edit_modal .modal_content form .addon_fields_wrap > div').not(':first').remove();
            $('#edit_modal .modal_content form .item_fields_wrap > div').not(':first').remove();
            i=0; j=0;
        });
    });   
});




// $('#edit_modal .modal_content').on('click', 'input[type=submit]', function() {
//     //var form_data = $('#edit_form').serialize();
//         $.ajax({
//         type: 'patch',
//         url : '{{URL::to('edit_submit')}}',
//         data: {'course_id': $('#edit_form input[name=course_id]').val(),
//                 'name': $('#edit_form input[name=name]').val(),
//                 'price': $('#edit_form input[name=price]').val(),
//                 'category': $('#edit_form input[name=category]').val(),
//                 'is_sustainable': $('#edit_form input[name=is_sustainable]').val(),
//                 'is_gf': $('#edit_form input[name=is_gf]').val(),
//                 'is_raw': $('#edit_form input[name=is_raw]').val(),
//                 'is_special': $('#edit_form input[name=is_special]').val(),
//                 'is_on_menu': $('#edit_form input[name=is_on_menu]').val()
//         },
//         success: function(data) {
//             console.log(data);
            
//         }
//     });
// });





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


