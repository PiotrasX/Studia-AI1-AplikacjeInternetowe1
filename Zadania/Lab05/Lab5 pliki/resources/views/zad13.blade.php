{{-- To jest komentarz. --}}

@if ($name)
    <p>Hello, {{ $name }}.</p>
    @if (Str::startsWith($name, 'B'))
        <p>Imię zaczyna się na B.</p>
    @else
        <p>Nie zaczyna się na B.</p>
    @endif
@else
    <p>Brak imienia.</p>
@endif

@if (count($arr) > 0)
    @foreach ($arr as $a)
        <p>{{ $a }}</p>

        @if ($loop->first)
            <p>To jest pierwsza iteracja przy pierwszym elemencie.</p>
        @endif

        @if ($loop->last)
            <p>To jest ostatnia iteracja przy ostatnim elemencie.</p>
        @endif
    @endforeach
@else
    <p>Tablica nie zawiera żadnych elementów.</p>
@endif
