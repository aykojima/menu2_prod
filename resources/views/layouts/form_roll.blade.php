
        {!! Form::text('name', null, ['placeholder' => 'Name (e.g. )',
             'class' => 'form_column_long']) !!}
        
        {!! Form::text('description', null, ['placeholder' => 'Name (e.g. )',
        'class' => 'form_column_long']) !!}

        <div class='div_column_medium'>
        {!! Form::text('price', null, ['placeholder' => 'Price (e.g. 10)', 'class' => 'form_column_medium']) !!}
        <div class="div_label_checkbox">
                {!! Form::select('category', ['SP_R' => 'Special Roll', 'R' => 'Roll',
                    'VG_R' => 'Vegetable Roll'], 'Special Roll') !!}
        </div>    
        </div>
        <div id= "sustainable">
            <div class="div_label_checkbox">
                {!! Form::label('is_sustainable', 'Sustainable') !!}
                {!! Form::hidden('is_sustainable', 'N') !!}
                {!! Form::checkbox('is_sustainable', 'Y', true) !!}
            </div>
            <div class="div_label_checkbox">
                {!! Form::label('is_gf', 'Gluten Free') !!}
                {!! Form::hidden('is_gf', 'N') !!}
                {!! Form::checkbox('is_gf', 'Y', true) !!}
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
        </div>
        {!! Form::submit('Save') !!}
    <!-- <input type="delete" value="delete"> -->
    <!-- {!! Form::close() !!} -->
<!-- </div> -->

