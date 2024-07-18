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
</style>

<table class="table mb-0 rounded-3 overflow-hidden table-bordered" width="100%">
    <thead>
        <tr>
            <th scope="col" class="table-special-title" width="25%">Imię i Nazwisko</th>
            <th scope="col" class="table-special-title" width="10%">Płeć</th>
            <th scope="col" class="table-special-title" width="17%">Data urodzenia  </th>
            <th scope="col" class="table-special-title" width="13%">Numer telefonu</th>
            <th scope="col" class="table-special-title" width="22%">Email</th>
            <th scope="col" class="table-special-title" width="13%">Stanowisko</th>
        </tr>
    </thead>
    <tbody class="table-group-divider table-divider">
        @php
            $totalData = 0;
        @endphp
        @foreach ($data as $item)
            @php
                $totalData += 1;
            @endphp
            <tr scope="row">
                <td class="table-col-1">{{ $item->user->data->first_name }} {{ $item->user->data->last_name }}
                </td>
                <td class="table-col-2">{{ $item->user->data->gender }}</td>
                <td class="table-col-1">
                    {{ \Carbon\Carbon::parse($item->user->data->date_of_birth)->format('d-m-Y') }}</td>
                <td class="table-col-2">{{ $item->user->data->phone_number }}</td>
                <td class="table-col-1">{{ $item->user->email }}</td>
                <td class="table-col-2">{{ $item->position }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot class="table-divider">
        <tr>
            <th scope="row" colspan="5" class="table-special-title">Ilość rekordów</th>
            <td class="table-tfoot">{{ $totalData }}</td>
        </tr>
    </tfoot>
</table>
