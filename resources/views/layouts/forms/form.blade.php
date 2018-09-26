@if(Request::is('sb'))
    {!! Form::text('eng_name', null, ['placeholder' => 'English Name (e.g. Amberjack)', 'class' => 'form_column_long']) !!}
    
    {!! Form::text('jpn_name', null, ['placeholder' => 'Japanese Name (e.g. Kanpachi)', 'class' => 'form_column_long']) !!}
    
    {!! Form::text('origin', null, ['placeholder' => 'Origin (e.g. Kona, HI)', 'class' => 'form_column_long']) !!}
    <div class='div_column_medium'>
    {!! Form::text('nigiri_price', null, ['placeholder' => 'Sushi Price (e.g. 5)', 'class' => 'form_column_medium',
        'id' => 'n_price', 'onkeyup' => 'calc_sashimi_price()']) !!}
    
    {!! Form::text('sashimi_price', null, ['placeholder' => 'Sashimi Price (e.g. 10)', 'class' => 'form_column_medium',
        'id' => 's_price']) !!}
    </div>
    <div id= "sustainable">
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
    </div>
    {!! Form::submit('Save') !!}

@elseif(Request::is('ippin'))


    {!! Form::text('name', null, ['placeholder' => 'Name (e.g. Mustard greens and Washington albacore tuna dressed with an almond wasabi sauce)',
            'class' => 'form_column_long']) !!}
    
    <div class='div_column_medium'>
    {!! Form::text('price', null, ['placeholder' => 'Price (e.g. 10)', 'class' => 'form_column_medium']) !!}
    <div class="div_label_checkbox">
            {!! Form::select('category', ['AP' => 'Appetizer', 'TM' => 'Tempura',
                'FS' => 'Fish', 'MT' => 'Meat'], 'Appetizer') !!}
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


@elseif(Request::is('roll'))
    {!! Form::text('name', null, ['placeholder' => 'Name (e.g. California Roll )',
            'class' => 'form_column_long']) !!}
    
    {!! Form::text('description', null, ['placeholder' => 'Description (e.g. Crab, avocado, mayo, cucumber, masago)',
    'class' => 'form_column_long']) !!}

    <div class='div_column_medium'>
    {!! Form::text('price', null, ['placeholder' => 'Price (e.g. 10)', 'class' => 'form_column_medium']) !!}
    <div class="div_label_checkbox">
            {!! Form::select('category', ['SP_R' => 'Special Roll', 'R' => 'Roll',
                'VG_R' => 'Vegetable Roll'])!!}
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


@endif