@php
    $totalPoints = 0;
@endphp

<table class="table mb-0 rounded-3 overflow-hidden d-lg-table d-none table-bordered" width="100%">
    <thead>
        <tr>
            <th scope="col" width="19%" class="table-special-title">#</th>
            @foreach ($subjectsAndWeight as $subject => $weight)
                @php
                    $class = $loop->index % 2 == 0 ? 'table-col-1' : 'table-col-2';
                    $width = in_array($loop->index, [0, 1, 2]) ? '12%' : '9%';
                @endphp
                <th scope="col" width="{{ $width }}" class="{{ $class }}">
                    {{ $subject }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody class="table-group-divider table-divider">
        @foreach (['Twoje punkty z egzaminu' => $candidatePoints, 'Przelicznik punktowy' => $subjectsAndWeight, 'Zdobyte punkty' => $candidatePoints] as $rowTitle => $data)
            <tr>
                <th scope="row" class="table-special-title">{{ $rowTitle }}</th>
                @foreach ($subjectsAndWeight as $subject => $weight)
                    @php
                        $class = $loop->index % 2 == 0 ? 'table-col-1' : 'table-col-2';
                        $value =
                            $data === $candidatePoints
                                ? ($candidatePoints[$subject] > 0
                                    ? $candidatePoints[$subject]
                                    : 'X')
                                : $weight;
                        if ($rowTitle === 'Zdobyte punkty') {
                            $value = $candidatePoints[$subject] > 0 ? $candidatePoints[$subject] * $weight : 'X';
                            if ($candidatePoints[$subject] > 0) {
                                $totalPoints += $value;
                            }
                        }
                    @endphp
                    <td class="{{ $class }}">{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tfoot class="table-divider">
        <tr>
            <th scope="row" class="table-special-title">Suma zdobytych punktów</th>
            <td colspan="{{ count($candidatePoints) }}" class="table-tfoot">
                {{ $totalPoints }}</td>
        </tr>
    </tfoot>
</table>

<table class="table mb-0 rounded-3 overflow-hidden d-lg-none d-table table-bordered" width="100%">
    <thead>
        <tr>
            <th scope="col" width="30%" class="table-special-title">#</th>
            <th scope="col" width="27%" class="table-special-title">Twoje punkty z egzaminu</th>
            <th scope="col" width="23%" class="table-special-title">Przelicznik punktowy</th>
            <th scope="col" width="20%" class="table-special-title">Zdobyte punkty</th>
        </tr>
    </thead>
    <tbody class="table-group-divider table-divider">
        @foreach ($subjectsAndWeight as $subject => $weight)
            @php
                $index = $loop->index;
                $points = $candidatePoints[$subject];
                $class = $index % 2 == 0 ? 'table-col-1' : 'table-col-2';
                $earnedPoints = $points > 0 ? $points * $weight : 'X';
            @endphp
            <tr>
                <th scope="row" class="{{ $class }}">{{ $subject }}</th>
                <td class="{{ $class }}">{{ $points > 0 ? $points : 'X' }}</td>
                <td class="{{ $class }}">{{ $weight }}</td>
                <td class="{{ $class }}">{{ $earnedPoints }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot class="table-divider">
        <tr>
            <th scope="row" class="table-special-title" colspan="3">Suma zdobytych punktów
            </th>
            <td class="table-tfoot">{{ $totalPoints }}</td>
        </tr>
    </tfoot>
</table>
