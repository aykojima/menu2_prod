<h2 class="form_category"></h2>
{!! Form::text('name', null, ['placeholder' => 'Name (e.g. Joto)', 'class' => 'form_column_long']) !!}

{!! Form::text('price', null, ['placeholder' => 'Price (e.g. 88)', 'class' => 'form_column_long']) !!}

{!! Form::text('description', null, ['placeholder' => 'Description / Grade (e.g. Daiginjo)', 'class' => 'form_column_long']) !!}

{!! Form::text('production_area', null, ['placeholder' => 'Production Area and year (e.g. Hiroshima)', 'class' => 'form_column_long']) !!}

{!! Form::submit('Save') !!}