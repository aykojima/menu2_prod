{!! Form::model($sb_item, ['method' => 'PATCH', 'action' => ['sb_controller@edit', $sb_item->sb_id]]) !!}
    {!! Form::text('sb_id', null, ['class' => 'form_column_long', 'id' => 'sb_id']) !!}
    @include('layouts.form')
    {!! Form::close() !!}