<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<style>
    .table tfoot tr:last-of-type td,
    .table tfoot tr:last-of-type th {
        border-bottom: none !important;
    }

    html[data-bs-theme='light'] #table-special-title {
        background-color: #d0fdff;
        padding-left: 10px;
    }

    html[data-bs-theme='dark'] #table-special-title {
        background-color: #06414a;
        padding-left: 10px;
        padding-right: 20px;
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

    #tableCandidates_wrapper .dataTables_length,
    #tableCandidates_wrapper .dataTables_filter {
        margin: 12px;
    }

    #tableCandidates_wrapper .dataTables_length {
        margin-top: 15px;
    }

    #tableCandidates_wrapper .dataTables_info {
        margin: 8px;
        margin-left: 24px;
    }

    #tableCandidates_wrapper .dataTables_paginate {
        margin: 8px;
        margin-bottom: 6px;
    }

    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_length,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_filter,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_info,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate {
        color: #dee2e6;
    }

    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button:hover,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button:active,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button:focus {
        color: #dee2e6 !important;
    }

    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #fdfdfd !important;
        background-image: none !important;
        color: #000000 !important;
    }

    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button.disabled,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button.disabled:hover,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button.disabled:active,
    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button.disabled:focus {
        color: #6c757d !important;
    }

    html[data-bs-theme='dark'] #tableCandidates_wrapper .dataTables_paginate .paginate_button:not(.disabled):not(.current) {
        color: #dee2e6 !important;
    }

    html[data-bs-theme='light'] #tableCandidates_wrapper .dataTables_paginate .paginate_button.disabled {
        color: #aaaaaa !important;
    }

    html[data-bs-theme='light'] #tableCandidates_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #fdfdfd !important;
        background-image: none !important;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        white-space: nowrap;
    }

    .dataTables_wrapper .dataTables_paginate {
        display: flex;
        justify-content: center;
    }

    .table-container {
        display: inline-block;
        min-width: 100%;
    }

    #table-divider {
        border-top: 2px solid #000 !important;
    }

    .table-col-edit {
        white-space: nowrap;
        width: 1%;
    }
</style>

<div class="table-container">
    <table id="tableCandidates" class="table table-striped table-bordered mb-0 overflow-hidden">
        <thead>
            <tr>
                @if (Auth::user()->role_id === 1)
                    <th scope="col" id="table-special-title" width="25%">Imię i Nazwisko</th>
                    <th scope="col" id="table-special-title" width="13%">Płeć</th>
                    <th scope="col" id="table-special-title" width="15%">Data urodzenia</th>
                    <th scope="col" id="table-special-title" width="15%">Numer telefonu</th>
                    <th scope="col" id="table-special-title" width="19%">Email</th>
                    <th scope="col" id="table-special-title" width="10%">Stan konta</th>
                    <th scope="col" id="table-special-title" width="3%">Akcja</th>
                @else
                    <th scope="col" id="table-special-title" width="27%">Imię i Nazwisko</th>
                    <th scope="col" id="table-special-title" width="13%">Płeć</th>
                    <th scope="col" id="table-special-title" width="15%">Data urodzenia</th>
                    <th scope="col" id="table-special-title" width="15%">Numer telefonu</th>
                    <th scope="col" id="table-special-title" width="19%">Email</th>
                    <th scope="col" id="table-special-title" width="11%">Stan konta</th>
                @endif
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if (Auth::user()->role_id === 1)
                @foreach ($candidates as $candidate)
                    <tr scope="row">
                        <td class="table-col-1">{{ $candidate->user->data->first_name }}
                            {{ $candidate->user->data->last_name }}
                        </td>
                        <td class="table-col-2">{{ $candidate->user->data->gender }}</td>
                        <td class="table-col-1">
                            {{ \Carbon\Carbon::parse($candidate->user->data->date_of_birth)->format('d-m-Y') }}</td>
                        <td class="table-col-2">{{ $candidate->user->data->phone_number }}</td>
                        <td class="table-col-1">{{ $candidate->user->email }}</td>
                        <td class="table-col-2">{{ $candidate->account_balance }} PLN</td>
                        <td class="table-col-1 table-col-edit" style="text-align: center;">
                            <form id="editForm-{{ $candidate->id }}" action="{{ route('admin.editCandidate') }}"
                                method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                <input type="hidden" name="user_id" value="{{ $candidate->user->id }}">
                                <input type="hidden" name="gender" value="{{ $candidate->user->data->gender }}">
                            </form>
                            <button type="button" class="btn btn-danger color-after btn-sm"
                                onclick="document.getElementById('editForm-{{ $candidate->id }}').submit();">
                                Edytuj
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($candidates as $candidate)
                    <tr scope="row">
                        <td class="table-col-1">{{ $candidate->user->data->first_name }}
                            {{ $candidate->user->data->last_name }}
                        </td>
                        <td class="table-col-2">{{ $candidate->user->data->gender }}</td>
                        <td class="table-col-1">
                            {{ \Carbon\Carbon::parse($candidate->user->data->date_of_birth)->format('d-m-Y') }}</td>
                        <td class="table-col-2">{{ $candidate->user->data->phone_number }}</td>
                        <td class="table-col-1">{{ $candidate->user->email }}</td>
                        <td class="table-col-2">{{ $candidate->account_balance }} PLN</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $.fn.dataTable.ext.type.order['email-asc'] = function(a, b) {
            var aLocal = a.split('@')[0];
            var bLocal = b.split('@')[0];
            return aLocal.localeCompare(bLocal);
        };

        $.fn.dataTable.ext.type.order['email-desc'] = function(a, b) {
            var aLocal = a.split('@')[0];
            var bLocal = b.split('@')[0];
            return bLocal.localeCompare(aLocal);
        };

        $.fn.dataTable.ext.type.order['date-dmy-pre'] = function(d) {
            var parts = d.split('-');
            return parts[2] + parts[1] + parts[0];
        };

        $('#tableCandidates').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": true,
            "pageLength": 10,
            "language": {
                "url": "/js/Polish.json"
            },
            "columnDefs": [{
                    "targets": 5,
                    "render": function(data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            return data;
                        }
                        return parseFloat(data.replace(/ PLN/g, '').replace(/,/g,
                            ''));
                    },
                    "type": "num"
                },
                {
                    "targets": 2,
                    "type": "date-dmy"
                },
                {
                    "targets": 4,
                    "type": "email"
                }
            ]
        });
    });
</script>
