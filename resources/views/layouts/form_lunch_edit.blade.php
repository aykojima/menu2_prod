<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Edit Lunch</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css" media="screen">
    <!--<link rel="stylesheet" href="../css/style-print.css" type="text/css" media="print"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

</head>
<body>

<div class="lunch_form">
        {!! Form::open(['action' => ['lunch_controller@edit_menu', $lunch_id]]) !!}
        <input value="{{$lunch->lunch_id}}" name="lunch_id" type="hidden">
    <div class="div_lunch_title">
        <input value="{{$lunch->title}}" placeholder="Title (e.g. Gozen)" class="form_column_medium" name="edit_title" type="text">
        <input value="{{$lunch->price}}" placeholder="Sub Title" class="form_column_medium" name="edit_subtitle" type="text">
    </div>  
    <div class="combo_fields_wrap">
        <div class='div_column_medium'>
            <input value="{{$lunch->combo_title}}" placeholder="Combination title (e.g. Served with miso soup)" class="form_column_medium" name="edit_combo_title" type="text">
            <textarea row="1" placeholder="Combination Description" class="form_column_long" name="edit_combo_desc">
                {{$lunch->combo_desc}}
            </textarea>
        </div>
    </div>

    <div class="item_fields_wrap">
        @foreach($lunch->l_items as $l_item)
        <?php $i=$loop->index; ?>
        <div>
        <input value="{{ $l_item->l_item_id }}" name="edit_l_item_id[]" type="hidden">
            <div class="div_column_medium">
                <input value="{{$l_item->name}}" placeholder="Item (e.g. Sushi combo)" class="form_column_medium" name="edit_item_name[]" type="text">
                <input value="{{$l_item->price}}" placeholder="Price" class="form_column_medium" name="edit_item_price[]" type="text">    
            </div>
            <div class="div_choice">
                <div class="div_label_checkbox">
                    <label for="edit_is_raw">This is raw</label>
                    <input name="edit_is_raw[{{$i}}]" value="N" type="hidden">
                    <input class="is_raw_checkbox" name="edit_is_raw[{{$i}}]" value="Y" type="checkbox"
                    @if($l_item->is_raw == "Y") checked=checked 
                    @endif>
                    
                </div>
            </div>
            <button id="show_description_box" class="new_section"
                @if($l_item->description) style='display: none;'
                @endif>&#43;
                <span class="new_section_text">Add description</span>
            </button>
            <textarea rows="5" placeholder="Description (e.g. Seven pieces of nigiri sushi)" class="form_column_long" name="edit_item_description[]"
                @if($l_item->description == null) style='display: none;'
                @endif>
                {{$l_item->description}}
            </textarea>
            <button type="button" name="remove_description" class="remove_description_field"
                @if($l_item->description == null) style='display: none;'
                @endif>&times;</button>
        </div>
        @endforeach
        </div>
        <button id="add_more_items" class="new_section">&#43;
            <span class="new_section_text">Add more item</span>
        </button>
        <div class="buttons">
            <input value="Save" type="submit">
            <a href="{{action('lunch_controller@delete', $lunch->lunch_id)}}">Delete</a>
        </div>
        {!! Form::close() !!}
    </div>


</body>
<script>        
// $('#edit_modal').css('display', 'block');

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
// $("#edit_modal .modal_content input[name='edit_lunch_id']").val(data.course.lunch_id);
var j=0; 

$('#add_more_items').click(function(e){  
    e.preventDefault();
     j++;  
     $('.item_fields_wrap').append('<div><div class="div_column_medium">' +
          '<input placeholder="Item (e.g. Sushi combo)" class="form_column_medium" name="item_name[]" type="text">' +
          '<input placeholder="Price" class="form_column_medium" name="item_price[]" type="text">' +    
          '</div><div class="div_choice"><div class="div_label_checkbox">' +
          '<label for="is_raw">This is raw</label>' +
          '<input name="is_raw[' + j + ']" value="N" type="hidden">' +
          '<input class="is_raw_checkbox" name="is_raw[' + j + ']" value="Y" type="checkbox">' +
          '</div></div><button id="show_description_box" class="new_section">&#43;' +
          '<span class="new_section_text">Add description</span></button>' +
          '<textarea rows="1" placeholder="Description (e.g. Seven pieces of nigiri sushi)" class="form_column_long" name="item_description[]"></textarea>' +
          '<button type="button" name="remove_description" class="remove_description_field">&times;</button>' +
          '<button type="button" name="remove" id="'+j+'" class="remove_field">&times;</button></div>');  
});

  $(".item_fields_wrap").on("click", ".remove_description_field", function(e){
      e.preventDefault();
      $(this).css('display', 'none');
      $(this).prev().css('display', 'none');
      $(this).prev().prev().css('display', 'block');
  });

    //   $(".addon_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
    //     e.preventDefault(); $(this).parent('div').remove(); i--;
    //     });

      $(".item_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
         e.preventDefault(); $(this).parent('div').remove(); j--;
        });

</script>


<script>
$( ".icon" ).click(function() {
    $( "#nav" ).toggleClass( "responsive" );
});

</script>
</html>