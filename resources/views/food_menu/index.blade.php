@foreach($sbs as $sb)
    <h3>{{ $sb->eng_name }} / {{ $sb->jpn_name }}</h3>
    <p>{{ $sb->origin}}</p>
    <p>{{ $sb->nigiri_price}}</p>
    <p>{{ $sb->sashimi_price}}</p>
    <p>
        <a href="{{ route('edit', $sb->sb_id) }}" class="btn btn-primary">Edit Item</a>
    </p>
    <hr>
@endforeach