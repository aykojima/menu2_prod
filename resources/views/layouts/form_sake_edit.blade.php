
        {!! Form::text('name', null, ['placeholder' => 'Name (e.g. Miyasaka "Yawaraka" "Sake Matinee")', 'class' => 'form_column_long']) !!}
        
        <!-- {!! Form::text('origin', null, ['placeholder' => 'Origin (e.g. Kona, HI)', 'class' => 'form_column_long']) !!} -->
        <div class='div_column_medium'>
        {!! Form::text('price', null, ['placeholder' => 'Price (e.g. 15)', 'class' => 'form_column_medium']) !!}
        
        {!! Form::text('production_area', null, ['placeholder' => 'Production Area (e.g. Nagano)', 'class' => 'form_column_medium']) !!}

        {!! Form::text('rice', null, ['placeholder' => 'Rice (e.g. Miyamanishiki, Hitogokochi)', 'class' => 'form_column_medium']) !!}

        {!! Form::text('sweetness', null, ['placeholder' => 'Sweetness (e.g. -4)', 'class' => 'form_column_medium']) !!}

        {!! Form::text('description', null, ['placeholder' => 'Description (e.g. light and sweet; raspverry, roses)', 'class' => 'form_column_long']) !!}

        </div>
        <!-- <div id= "sustainable">
            <div class="div_label_checkbox">
                {!! Form::label('is_sustainable', 'Sustainable') !!}
                {!! Form::hidden('is_sustainable', 'N') !!}
                {!! Form::checkbox('is_sustainable', 'Y', true) !!}
            </div>
            <div class="div_label_checkbox">
                {!! Form::label('is_raw', 'Raw') !!}
                {!! Form::hidden('is_raw', 'N') !!}
                {!! Form::checkbox('is_raw', 'Y', true) !!}
            </div>
            <div class="div_label_checkbox">
                {!! Form::label('is_special', 'Special Menu') !!}
                {!! Form::hidden('is_special', 'N') !!}
                {!! Form::checkbox('is_special', 'Y') !!}
            </div>
            <div class="div_label_checkbox">
                {!! Form::label('is_on_menu', 'This is on the menu today') !!}
                {!! Form::hidden('is_on_menu', 'N') !!}
                {!! Form::checkbox('is_on_menu', 'Y', true) !!}
            </div>
        </div> -->
        <div class="buttons">
            <input value="Save" type="submit">
            <a href="{{action('sake_controller@delete')}}">Delete</a>
        </div>
    {!! Form::close() !!}
<!-- </div> -->

