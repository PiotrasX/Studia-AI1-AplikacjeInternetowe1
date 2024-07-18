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

    .highlight-user-class {
        font-weight: bold;
    }

    .table-divider {
        border-top: 2px solid #000;
    }

    .no-wrapper {
        white-space: nowrap;
    }
</style>

<table class="table mb-0 rounded-3 overflow-hidden table-bordered" width="100%">
    <thead>
        <tr>
            <th scope="col" class="table-special-title" width="10%">Miejsce</th>
            <th scope="col" class="table-special-title" width="25%">Kandydat</th>
            <th scope="col" class="table-special-title" width="25%">Płeć</th>
            <th scope="col" class="table-special-title" width="25%">Data złożenia</th>
            <th scope="col" class="table-special-title" width="15%">Suma punktów</th>
        </tr>
    </thead>
    <tbody class="table-group-divider table-divider">
        @php
            $totalPoints = 0;
            $totalRegistrations = count($registrationsByProfileId);
            $number_of_seats = $profile->number_of_seats;
        @endphp
        @foreach ($registrationsByProfileId as $index => $registration)
            @php
                $totalPoints += $registration->point_score;
                $rowClass = $index < $number_of_seats ? 'table-success' : 'table-danger';
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
            <tr scope="row" class="{{ $rowClass }}">
                <td class="{{ $highlightClass }}">{{ $index + 1 }}</td>
                <td class="{{ $highlightClass }}">{{ $initials }}</td>
                <td class="{{ $highlightClass }}">{{ $registration->gender }}</td>
                <td class="{{ $highlightClass }} no-wrapper">{{ $registration->date_of_submission }}</td>
                <td class="{{ $highlightClass }}">
                    {{ rtrim(rtrim(number_format($registration->point_score, 2), '0'), '.') }}</td>
            </tr>
        @endforeach
        @php
            $meanPoints = $totalRegistrations > 0 ? $totalPoints / $totalRegistrations : 0;
        @endphp
    </tbody>
    <tfoot class="table-divider">
        <tr>
            <th scope="row" colspan="4" class="table-special-title">Średnia punktów</th>
            <td class="table-tfoot">{{ rtrim(rtrim(number_format($meanPoints, 2), '0'), '.') }}</td>
        </tr>
    </tfoot>
</table>
