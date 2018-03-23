@extends('layouts.header')

@section('content')

<div id="container">
    <div id="menu">
        <h1 id="ippin">Course Meals</h1>
        <div id='show_result_course'>
        @foreach($courses as $course)
            <div id="two" class="course_divs">
                <h2 id="{{ $course->course_id }}_course_title" class="course_titles" contentEditable="true" onblur="javascript: edit_content(this, 'course', 'title', '{{ $course->course_id }}');">
                    
                    {{ $course->title }}</h2>
                <p class="course_prices">{{ $course->price }}</p>
                <div class="additionals">
                    @foreach($course->c_add_on_items as $add_on)
                        <p class="add_name">{{ $add_on->description }}</p>
                        <p class="add_price">{{ $add_on->price }}</p>
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
    //$("#1_course_title").onblur = function() {  
    function edit_content(contents, model_name, column, id){
      $(contents).css("background","#FFF");
      var string = contents.innerHTML;
      if(string.includes("&nbsp;") == true){
          //console.log("stripping the space");
          string = string.replace("&nbsp;", "").trim();
      }
      console.log(string);
    //   $.ajax({
    //       type: 'post',
    //       url: '{{ URL::to('course/edit') }}',
    //       data:'column='+column+'&editval='+string+'&id='+id,
    //       success: function(data){
    //           console.log(data);
    //           $(contents).css("background","#FDFDFD");
    //       }        
    //  });
  }
  </script>

@endsection


