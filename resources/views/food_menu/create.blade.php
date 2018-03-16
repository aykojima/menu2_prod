<div id='add_new_div'>
    <button id='close_add_new_tab' onclick='hide_add_new_div()'>X</button>
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    {!! Form::open(['route' => 'store']) !!}
    @include('layouts.form')
    {!! Form::close() !!}
 </div>