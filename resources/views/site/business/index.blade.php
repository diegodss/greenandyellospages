<ul class="language_bar_chooser">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <li>
        <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
            {{ $properties['native'] }}
        </a>
    </li>
    @endforeach
</ul>
<h1>{{ $title }}</h1>

<p>{{ LaravelLocalization::getCurrentLocale() }}</p>

@foreach ($business as $bs)

<div>{{ $bs->business_name}}</div>
<div>{{ $bs->business_phone}}</div>


@endforeach
