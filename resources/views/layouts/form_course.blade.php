
        {!! Form::text('title', null, ['placeholder' => 'Title (e.g. Two Course)',
             'class' => 'form_column_long']) !!}
        <div class="addon_fields_wrap">
            <div class='div_column_medium'>
                {!! Form::text('addon_description[]', null, ['placeholder' => 'Add-ons (e.g. Served with miso soup)', 'class' => 'form_column_medium']) !!}
                {!! Form::text('addon_price[]', null, ['placeholder' => 'Price', 'class' => 'form_column_medium']) !!}    
            </div>
        </div>
        <button id="add_more_addons" class="new_section">&#43;</button>
        
        <div class="item_fields_wrap">
            <div>
                <div id= "sustainable">
                    <div class="div_label_checkbox">
                        {!! Form::label('choice', 'Choice of') !!}
                        {!! Form::hidden('choice[0]', 'N') !!}
                        {!! Form::checkbox('choice[0]', 'Y', null, ['class' => 'choice_checkbox']) !!}

                    </div>
                </div>
                <div class='div_column_medium'>
                    {!! Form::text('item_name[]', null, ['placeholder' => 'Item (e.g. Sushi combo)', 'class' => 'form_column_medium']) !!}
                    {!! Form::text('item_price[]', null, ['placeholder' => 'Price', 'class' => 'form_column_medium']) !!}    
                </div>
                {!! Form::text('item_description[]', null, ['placeholder' => 'Description (e.g. Seven pieces of nigiri sushi)',
                    'class' => 'form_column_long']) !!}
            </div>
        </div>
        <button id="add_more_items" class="new_section">&#43;</button>
        {!! Form::submit('Save') !!}
    <!-- <input type="delete" value="delete"> -->
    <!-- {!! Form::close() !!} -->
<!-- </div> -->

