
        {!! Form::text('edit_title', null, ['placeholder' => 'Title (e.g. Two Course)',
             'class' => 'form_column_long']) !!}
     
        <div class="addon_fields_wrap">
        {!! Form::hidden('c_add_on_id[]') !!}
            <div class='div_column_medium'>
                {!! Form::text('edit_addon_description[]', null, ['placeholder' => 'Add-ons (e.g. Served with miso soup)', 'class' => 'form_column_medium']) !!}
                {!! Form::text('edit_addon_price[]', null, ['placeholder' => 'Price', 'class' => 'form_column_medium']) !!}    
            </div>
        </div>
        <button id="add_more_addons" class="new_section">&#43;</button>
        
        <div class="item_fields_wrap">
            <div>
            {!! Form::hidden('c_item_id[]') !!}
                <div id= "sustainable">
                    <div class="div_label_checkbox">
                        {!! Form::label('choice', 'Choice of') !!}
                        {!! Form::hidden('edit_choice[0]', 'N') !!}
                        {!! Form::checkbox('edit_choice[0]', 'Y', null, ['class' => 'choice_checkbox']) !!}

                    </div>
                </div>
                <div class='div_column_medium'>
                    {!! Form::text('edit_item_name[]', null, ['placeholder' => 'Item (e.g. Sushi combo)', 'class' => 'form_column_medium']) !!}
                    {!! Form::text('edit_item_price[]', null, ['placeholder' => 'Price', 'class' => 'form_column_medium']) !!}    
                </div>
                {!! Form::text('edit_item_description[]', null, ['placeholder' => 'Description (e.g. Seven pieces of nigiri sushi)',
                    'class' => 'form_column_long']) !!}
            </div>
        </div>
        <button id="add_more_items" class="new_section">&#43;</button>
        {!! Form::submit('Save') !!}
    <!-- <input type="delete" value="delete"> -->
    <!-- {!! Form::close() !!} -->
<!-- </div> -->

