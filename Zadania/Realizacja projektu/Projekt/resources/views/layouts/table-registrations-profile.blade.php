<style>
    .table tfoot tr:last-of-type td,
    .table tfoot tr:last-of-type th {
        border-bottom: none !important;
    }

    html[data-bs-theme='light'] .table-special-title {
        background-color: #d0fdff;
    }

    html[data-bs-theme='dark'] .table-special-title {
        background-color: #06414a;
    }

    html[data-bs-theme='light'] .table-col-1 {
        background-color: #fef3e4;
    }

    html[data-bs-theme='dark'] .table-col-1 {
        background-color: #472606;
    }

    html[data-bs-theme='light'] .table-col-2 {
        background-color: #f1ffca;
    }

    html[data-bs-theme='dark'] .table-col-2 {
        background-color: #585d01;
    }

    html[data-bs-theme='light'] .table-tfoot {
        background-color: #f5eff8;
    }

    html[data-bs-theme='dark'] .table-tfoot {
        background-color: #3b124f;
    }

    .table-divider {
        border-top: 2px solid #000;
    }

    .highlight-user-class {
        font-weight: bold;
    }

    .no-wrapper {
        white-space: nowrap;
    }
</style>

<table class="table mb-0 rounded-3 overflow-hidden table-bordered" width="100%">
    <thead>
        <tr>
            <th scope="col" class="table-special-title" width="10%">Miejsce</th>
            <th scope="col" class="table-special-title" width="21%">Kandydat</th>
            <th scope="col" class="table-special-title" width="22%">Płeć</th>
            <th scope="col" class="table-special-title" width="22%">Data złożenia</th>
            <th scope="col" class="table-special-title" width="15%">Suma punktów</th>
            <th scope="col" class="table-special-title" width="10%">Opłacono</th>
        </tr>
    </thead>
    <tbody class="table-group-divider table-divider">
        @php
            $totalPoints = 0;
            $totalRegistrations = count($registrations);
            $number_of_seats = $profile->number_of_seats;
            $entry_fee = $profile->entry_fee;
            $filled_seats = 0; // Licznik miejsc, które zostały zajęte przez opłaconych kandydatów w limicie
        @endphp
        @foreach ($registrations as $index => $registration)
            @php
                $totalPoints += $registration->point_score;
                $rowClass = 'table-danger';
                $paidAll = 'NIE';

                if ($registration->total_paid >= $entry_fee) {
                    $filled_seats++;
                    $paidAll = 'TAK';
                    if ($filled_seats <= $number_of_seats) {
                        $rowClass = 'table-success';
                    }
                } else {
                    $rowClass = 'table-danger';
                }

                $initials = mb_strtoupper(
                    mb_substr($registration->first_name, 0, 1) . mb_substr($registration->last_name, 0, 1),
                    'UTF-8',
                );

                $highlightClass = '';
                if ($highlightUser !== null && $registration->candidate_id === $highlightUser) {
                    $highlightClass = 'highlight-user-class';
                    $initials = str($initials) . ' — ty';
                }
            @endphp
            <tr scope="row" class="{{ $rowClass }} {{ $highlightClass }}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $initials }}</td>
                <td>{{ $registration->gender }}</td>
                <td style="white-space: nowrap;">{{ $registration->date_of_submission }}</td>
                <td>{{ rtrim(rtrim(number_format($registration->point_score, 2), '0'), '.') }}</td>
                <td>{{ $paidAll }}</td>
            </tr>
        @endforeach
        @php
            $meanPoints = $totalRegistrations > 0 ? $totalPoints / $totalRegistrations : 0;
        @endphp
    </tbody>
    <tfoot class="table-divider">
        <tr>
            <th scope="row" colspan="4" class="table-special-title">Średnia punktów</th>
            <td colspan="2" class="table-tfoot">{{ rtrim(rtrim(number_format($meanPoints, 2), '0'), '.') }}</td>
        </tr>
    </tfoot>
</table>
