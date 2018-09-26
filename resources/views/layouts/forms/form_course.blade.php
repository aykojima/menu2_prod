@if(Request::is('course'))
<div class="course_form">
    <div class="div_course_title">
        <input placeholder="Title (e.g. Two Course)" class="form_column_medium" name="title" type="text">
        <input placeholder="Price" class="form_column_medium" name="course_price" type="text">
    </div>

    <div class="addon_fields_wrap">
        <div class='div_column_medium'>
            <input placeholder="Add-ons (e.g. Served with miso soup)" class="form_column_medium" name="addon_description[]" type="text">
            <input placeholder="Price" class="form_column_medium" name="addon_price[]" type="text">
        </div>
    </div>
    <button id="add_more_addons" class="new_section">&#43;
        <span class="new_section_text">Add more add-on item</span>
    </button>

    <div class="item_fields_wrap">
        <div>
            <div class="div_choice">
                <div class="div_label_checkbox">
                    <label for="choice">Choice of</label>
                    <input name="choice[0]" value="N" type="hidden">
                    <input class="choice_checkbox" name="choice[0]" value="Y" type="checkbox">
                </div>
            </div>
            <div class="div_column_medium">
                <input placeholder="Item (e.g. Sushi combo)" class="form_column_medium" name="item_name[]" type="text">
                <input placeholder="Price" class="form_column_medium" name="item_price[]" type="text">    
            </div>
            <button id="show_description_box" class="new_section">&#43;
                <span class="new_section_text">Add description</span>
            </button>
            <textarea rows="1" placeholder="Description (e.g. Seven pieces of nigiri sushi)" class="form_column_long" name="item_description[]"></textarea>
            <button type="button" name="remove_description" class="remove_description_field">&times;</button>
        </div>
    </div>
    <button id="add_more_items" class="new_section">&#43;
        <span class="new_section_text">Add more item</span>
    </button>
    <input value="Add" type="submit">
</div>

@else

<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>SKT menu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" media="screen">
    <!--<link rel="stylesheet" href="../css/style-print.css" type="text/css" media="print"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

</head>
<body>

    <div class="edit_course_form">
        {!! Form::open(['action' => ['course_controller@edit_menu', $course_id]]) !!}
        <input value="{{$course->course_id}}" name="course_id" type="hidden">
        <div class="div_course_title">
            <input value="{{$course->title}}" class="form_column_medium" name="edit_title" type="text">
            <input value="{{$course->price}}" placeholder="Price" class="form_column_medium" name="edit_course_price" type="text">
        </div>
        
        <div class="addon_fields_wrap">
        @foreach($course->c_add_on_items as $c_add_on_item)
            <input value="{{$c_add_on_item->c_add_on_id}}" name="edit_c_add_on_id[]" type="hidden">
            <div class='div_column_medium'>
                <input value="{{$c_add_on_item->description}}" class="form_column_medium" name="edit_addon_description[]" type="text">
                <input placeholder="Price" value="{{$c_add_on_item->price}}" class="form_column_medium" name="edit_addon_price[]" type="text">
            </div>
            @endforeach
        </div>
        
        <button id="add_more_addons" class="new_section">&#43;
            <span class="new_section_text">Add more add-on item</span>
        </button>

        <div class="item_fields_wrap">
        @foreach($course->c_items as $c_item)
        <?php $i=$loop->index; ?>
        <div>
        <input value="{{ $c_item->c_item_id }}" name="edit_c_item_id[]" type="hidden">
            <div class="div_choice">
                <div class="div_label_checkbox">
                    <label for="choice">Choice of</label>
                    <input name="edit_choice[{{$i}}]" value="N" type="hidden">
                    <input class="choice_checkbox" name="edit_choice[{{$i}}]" value="Y" type="checkbox"
                    @if($c_item->choice == "Y") checked=checked 
                    @endif>
                </div>
            </div>
            <div class="div_column_medium">
                <input value="{{$c_item->name}}" class="form_column_medium" name="edit_item_name[]" type="text">
                <input value="{{$c_item->price}}" class="form_column_medium" name="edit_item_price[]" type="text">    
            </div>
            <button id="show_description_box" class="new_section"
            @if($c_item->description) style='display: none;'
                @endif>&#43;
                <span class="new_section_text">Show description</span>
            </button>
            <textarea rows="1" placeholder="Description (e.g. Seven pieces of nigiri sushi)" class="form_column_long" name="edit_item_description[]"
                @if($c_item->description == null) style='display: none;'
                @endif>
                {{$c_item->description}}
            </textarea>
            <button type="button" name="remove_description" class="remove_description_field"
                @if($c_item->description == null) style='display: none;'
                @endif>&times;</button>
        </div>
        @endforeach
        </div>
        <button id="add_more_items" class="new_section">&#43;
            <span class="new_section_text">Add more item</span>
        </button>
        <div class="buttons">
            <input value="Save" type="submit">
            <a href="{{action('course_controller@delete', $course->course_id)}}">Delete</a>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- </div>
</div> -->
</body>
<script>        
$('#edit_modal').css('display', 'block');
                
$(document).on("click", "#show_description_box", function(e){
        e.preventDefault();
        $(this).next().toggle();
        $(this).toggle();
        $(this).next().next('.remove_description_field').toggle();
    });

$(".item_fields_wrap").on("click", ".remove_description_field", function(e){
        e.preventDefault();
        $(this).toggle();
        $(this).prev().toggle();
        $(this).prev().prev().toggle();
    });
// $("#edit_modal .modal_content input[name='edit_title']").val(data.course.title);
// $("#edit_modal .modal_content input[name='edit_course_id']").val(data.course.course_id);
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

      $(".addon_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); i--;
        });

      $(".item_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
         e.preventDefault(); $(this).parent('div').remove(); j--;
        });

$( ".icon" ).click(function() {
    $( "#nav" ).toggleClass( "responsive" );
});

</script>
</html>

@endif