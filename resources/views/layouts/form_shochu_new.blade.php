<h2 class="form_category"></h2>
{!! Form::text('name', null, ['placeholder' => 'Name (e.g. Kakushigura Mugi)', 'class' => 'form_column_long']) !!}

{!! Form::text('price', null, ['placeholder' => 'Price (e.g. 12)', 'class' => 'form_column_long']) !!}

{!! Form::text('production_area', null, ['placeholder' => 'Production Area (e.g. Kagoshima)', 'class' => 'form_column_long']) !!}

{!! Form::text('description', null, ['placeholder' => 'Description (e.g. 24%abv light weight oak aged shochu; refined)', 'class' => 'form_column_long']) !!}

{!! Form::submit('Save') !!}