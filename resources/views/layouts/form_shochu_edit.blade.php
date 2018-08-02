{!! Form::text('name', null, ['placeholder' => 'Name (e.g. Kakushigura Mugi)', 'class' => 'form_column_long']) !!}

{!! Form::text('price', null, ['placeholder' => 'Price (e.g. 12)', 'class' => 'form_column_long']) !!}

{!! Form::text('production_area', null, ['placeholder' => 'Production Area (e.g. Kagoshima)', 'class' => 'form_column_long']) !!}

{!! Form::text('description', null, ['placeholder' => 'Description (e.g. 24%abv light weight oak aged shochu; refined)', 'class' => 'form_column_long']) !!}

<div class="buttons">
    <input value="Save" type="submit" name="submit">
    <input value="Delete" type="submit" name="submit">
    <!-- <a href="#">Delete</a> -->
</div>
{!! Form::close() !!}


