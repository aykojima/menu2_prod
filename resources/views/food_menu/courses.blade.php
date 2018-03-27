@extends('layouts.header')

@section('content')

<div id="container">
    <div id="menu">
        <h1 id="ippin">Course Meals</h1>
        <div id='show_result_course'>
        @foreach($courses as $course)
            <div id="two" class="course_divs">
                <h2 id="{{ $course->course_id }}_course_title" class="course_titles" contentEditable="true" data-id="{{ $course->course_id }}" data-column="title" data-model="course">    
                    {{ $course->title }}</h2>
                <p class="course_prices">{{ $course->price }}</p>
                <div class="additionals">
                    @foreach($course->c_add_on_items as $add_on)
                        <p class="add_name" contentEditable="true" data-id="{{ $add_on->c_add_on_id }}" data-column="description" data-model="c_add_on_item">{{ $add_on->description }}</p>
                        <p class="add_price" contentEditable="true" data-id="{{ $add_on->c_add_on_id }}" data-column="price" data-model="c_add_on_item">{{ $add_on->price }}</p>
                    @endforeach
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
                                    <p class="item_names">{{ $item->name }}</p>
                                    <p class="item_prices">{{ $item->price }}</p>
                                </div>
                                <div class="descriptions">
                                    {{ $item->description }}
                                </div>  
                            </li>
                         @endforeach
                     </ul>
                 </div>
             </div>

             <div id="omakase" class="courses">
                @foreach($course->c_omakases as $omakase)
                    <h3 class="name">{{ $omakase_name }}</h3>
                    <h3 class="price">{{ $omakase->om_price }}</h3>
                    <div class="additionals">
                        <p class='name'>{{ $omakase->description }}</p>
                        <p class="price">{{ $omakase->desc_price }}</p>
                    </div>
                @endforeach
             </div>
        @endforeach
        </div>
    </div>
</div>

<script>

$(".course_titles").click(function (event) {    
    var inline_edit = $(this),
        current_value = $.trim(inline_edit.text()),
        column = $(this).data('column'),
        model = $(this).data('model'),
        id = $(this).data('id');      
        
    inline_edit.on("blur", function () {
        var inline_edit = $(this),
        new_value = $.trim(inline_edit.text());
        $(this).trigger("contentchange", [ column, model, id, current_value, new_value ]);
    })
    .on("keydown", function (event) {
        // console.log(event);
        if (event.keyCode == 13) 
        {
            $(this).trigger("contentchange", [ column, model, id, current_value, new_value ]);
        }
    })
    .on("contentchange", function (event, column, model, id, current_value, new_value) {
        //.on("contentchange", function () { 
        var me = $(this);
        event.preventDefault();
        
        if ( me.data('requestRunning') ) {
            return;
        }

        me.data('requestRunning', true);

        if (new_value === current_value) {
            $inline_edit
                .text(current_value);
                // .removeClass('ajax');
        }else 
        {
            edit_contents({
                column: column, 
                model: model, 
                id: id,
                contents: new_value
            }).done(function (data) {
                //console.log(data);
                $inline_edit.text(data);
            }).complete(function (){
                me.data('requestRunning', false);
            }).fail(function () {
                $inline_edit.text(current_value);
            });
        }
    })
    .focus();
});

function edit_contents(params) {
    return $.ajax({
        url: '{{ URL::to('course/edit') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: "post",
        data: params,
    }).fail(function(xhr, status, error) {
        console.warn(xhr.responseText);
        alert(error);
    });
}
  </script>

@endsection


