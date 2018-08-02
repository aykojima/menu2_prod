{!! Form::text('name', null, ['placeholder' => 'Name (e.g. Asahi "Super Dry")', 'class' => 'form_column_long']) !!}

{!! Form::text('price', null, ['placeholder' => 'Price (e.g. 10)', 'class' => 'form_column_long']) !!}

{!! Form::text('description', null, ['placeholder' => 'Description (e.g. Toronto, Canada 21.4 oz bottle)', 'class' => 'form_column_long']) !!}

<div class="buttons">
    <input value="Save" type="submit" name="submit">
    <input value="Delete" type="submit" name="submit">
    <!-- <a href="#">Delete</a> -->
</div>
{!! Form::close() !!}


