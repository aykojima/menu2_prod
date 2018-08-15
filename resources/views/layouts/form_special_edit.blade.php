{!! Form::text('name', null, ['placeholder' => 'Name (e.g. Joto)', 'class' => 'form_column_long']) !!}

{!! Form::text('price', null, ['placeholder' => 'Price (e.g. 88)', 'class' => 'form_column_long']) !!}

{!! Form::text('description', null, ['placeholder' => 'Description / Grade (e.g. Daiginjo)', 'class' => 'form_column_long']) !!}

{!! Form::text('production_area', null, ['placeholder' => 'Production Area (e.g. Hiroshima)', 'class' => 'form_column_long']) !!}

<div class="buttons">
    <input value="Update" type="submit" name="submit">
    <input value="Delete" type="submit" name="submit">
    <!-- <a href="#">Delete</a> -->
</div>
{!! Form::close() !!}


