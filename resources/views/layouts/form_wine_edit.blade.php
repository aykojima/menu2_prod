
        <h2 class="form_category"></h2>
        {!! Form::text('name', null, ['placeholder' => 'Name (e.g. Gruet "Sauvage")', 'class' => 'form_column_long']) !!}
        
        <!-- {!! Form::text('origin', null, ['placeholder' => 'Origin (e.g. Nagano)', 'class' => 'form_column_long']) !!} -->
        {!! Form::text('type', null, ['placeholder' => 'Type of Wine (e.g. Blanc de Blancs)', 'class' => 'form_column_long']) !!}
        <!-- <div class='div_column_medium'> -->
            {!! Form::text('price', null, ['placeholder' => 'Price (e.g. 13)', 'class' => 'form_column_long']) !!}
            <label>Bottle size is not standard(750ml)</label>
            {!! Form::hidden('size_checkbox', '750ml') !!}
            {!! Form::checkbox('size_checkbox', 'Size is not 750ml') !!}
            <div class="bottle_size_hide">
                {!! Form::text('size', null, ['placeholder' => 'Bottle size (e.g. 300)', 'class' => 'form_column_long']) !!} 
                <p>ml</p>
                <label>There a price for the different sized bottle</label>
                {!! Form::text('second_price', null, ['placeholder' => 'Price (e.g. 15)', 'class' => 'form_column_long']) !!}
            </div>
            {!! Form::text('production_area', null, ['placeholder' => 'Production Area (e.g. USA)', 'class' => 'form_column_long']) !!}
            
            {!! Form::text('year', null, ['placeholder' => 'Year (e.g. 2017)', 'class' => 'form_column_long']) !!}
            {!! Form::text('description', null, ['placeholder' => 'Description (e.g. light and sweet; raspverry, roses)', 'class' => 'form_column_long']) !!}


        <div class="buttons">
            <input value="Save" type="submit" name="submit">
            <input value="Delete" type="submit" name="submit">
            <!-- <a href="#">Delete</a> -->
        </div>
    {!! Form::close() !!}
<!-- </div> -->

