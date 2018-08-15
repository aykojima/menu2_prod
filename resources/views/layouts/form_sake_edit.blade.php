
    {!! Form::text('name', null, ['placeholder' => 'Name (e.g. Miyasaka "Yawaraka" "Sake Matinee")', 'class' => 'form_column_long']) !!}
    
    {!! Form::text('grade', null, ['placeholder' => 'Grade (e.g. Junmai)', 'class' => 'form_column_long hide_when_flight']) !!}
    
    {!! Form::text('price', null, ['placeholder' => 'Price (e.g. 15)', 'class' => 'form_column_long']) !!}
    <div class='hide_when_flight'>
        <label>Bottle size is not standard(720ml)</label>
        {!! Form::hidden('size_checkbox', '720ml') !!}
        {!! Form::checkbox('size_checkbox', 'Size is not 720ml') !!}
        <div class="bottle_size_hide">
            {!! Form::text('size', null, ['placeholder' => 'Bottle size (e.g. 300)', 'class' => 'form_column_long']) !!} 
            <p>ml</p>
            <label>There is a price for the different sized bottle</label>
            {!! Form::text('second_price', null, ['placeholder' => 'Price (e.g. 15)', 'class' => 'form_column_long']) !!}
        </div>
    </div>
    {!! Form::text('production_area', null, ['placeholder' => 'Production Area (e.g. Nagano)', 'class' => 'form_column_long']) !!}

    {!! Form::text('rice', null, ['placeholder' => 'Rice (e.g. Miyamanishiki, Hitogokochi)', 'class' => 'form_column_long hide_when_flight']) !!}
    <div class='hide_when_flight'>
        <label>Sweetness</label>
        {!! Form::select('sweetness', 
            array('+10' => '+10', '+9' => '+9', '+8' => '+8', '+7' => '+7', '+6' => '+6', '+5' => '+5', '+4' => '+4', '+3' => '+3', '+2' => '+2', '+1' => '+1', '+0' => '+0',
            '' => '', '-0' => '-0', '-1' => '-1', '-2' => '-2', '-3' => '-3', '-4' => '-4', '-5' => '-5', '-6' => '-6', '-7' => '-7', '-8' => '-8', '-9' => '-9', '-10' => '-10',
            'other' => 'Other'), '') !!}
        <div class="sweetness_hide">
            {!! Form::text('sweetness_other', null, ['placeholder' => 'Sweetness (e.g. -4)', 'class' => 'form_column_long']) !!}
        </div>
    </div>
    {!! Form::text('description', null, ['placeholder' => 'Description (e.g. light and sweet; raspverry, roses)', 'class' => 'form_column_long']) !!}

    <div class="buttons">
        <input value="Update" type="submit" name="submit">
        <input value="Delete" type="submit" name="submit">
    </div>


