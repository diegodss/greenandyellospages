{{ $title }}

@foreach ($business as $bs)

<div>{{ $bs->business_name}}</div>
<div>{{ $bs->business_phone}}</div>


@endforeach
