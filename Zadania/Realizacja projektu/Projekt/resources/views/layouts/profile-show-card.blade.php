<div class="col-12 col-lg-5 pb-1 pb-lg-0 d-flex justify-content-center align-items-center">
    <img src="{{ asset('storage/img/profiles/' . $profile->image) }}" class="card-img-top card-img-bottom px-0"
        alt="Zdjęcie profilu {{ mb_strtolower($profile->name, 'UTF-8') }}"
        style="max-width: 100%; height: auto; object-fit: contain;">
</div>
<div class="card-body col-12 col-lg-7" style="text-align: center; margin-top: -12px;">
    <div class="row mx-0">
        <div class="card-text col-12 col-md-6 col-lg-5 pt-3 pt-lg-0">
            <strong>Wpisowe:</strong>
            <span>{{ $profile->entry_fee }} PLN</span><br>
            @if (Auth::user()->role_id === 3)
                <strong>Wpłacono:</strong>
                <span>{{ $registration->total_paid }} PLN</span><br>
            @endif
            <strong>Stan rekrutacji:</strong>
            <span>{{ $profile->open_recruitment ? 'otwarta' : 'zamknięta' }}</span><br>
            <strong>Ilość kandydatów:</strong>
            <span>{{ $registrationsCount[$profile->id] ?? 0 }}</span><br>
            <strong>Limit miejsc:</strong>
            <span>{{ $profile->number_of_seats }}</span><br>
        </div>
        <div class="card-text col-12 col-md-6 col-lg-7 pt-3 pt-lg-0">
            <strong>Przedmioty rozszerzone:</strong><br>
            @if ($profile->subjectExtended1)
                <span>{{ $profile->subjectExtended1->name }}:
                    {{ $profile->hours_subject_extended1 }} godzin</span><br>
            @endif
            @if ($profile->subjectExtended2)
                <span>{{ $profile->subjectExtended2->name }}:
                    {{ $profile->hours_subject_extended2 }} godzin</span><br>
            @endif
            @if ($profile->subjectExtended3)
                <span>{{ $profile->subjectExtended3->name }}:
                    {{ $profile->hours_subject_extended3 }} godzin</span><br>
            @endif
        </div>
        @if (Auth::user()->role_id === 1 && $profile->open_recruitment)
            <div class="card-text col-12 col-lg-11">
                <form id="endRecruitmentForm-{{ $profile->id }}" action="{{ route('admin.endRecruitment') }}"
                    method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                </form>
                <button type="button" class="btn btn-danger mt-3" onclick="confirmAndSubmit({{ $profile->id }});">
                    Zakończ rekrutację
                </button>
            </div>
            <script>
                function confirmAndSubmit(profileId) {
                    if (confirm('Czy na pewno chcesz zakończyć rekrutację na ten profil?')) {
                        document.getElementById('endRecruitmentForm-' + profileId).submit();
                    }
                }
            </script>
        @endif
        @if (Auth::user()->role_id === 1 && request()->routeIs('admin.profiles'))
            <div
                class="card-text col-12 col-lg-11 d-flex flex-wrap gap-3 justify-content-center align-items-center mt-3">
                <a href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}" class="btn btn-danger">
                    Edytuj
                </a>
                <form id="deleteProfileForm-{{ $profile->id }}" action="{{ route('admin.deleteProfile') }}"
                    method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="profile_id" value="{{ $profile->id }}">
                </form>
                <button type="button" class="btn btn-danger" onclick="confirmAndDelete({{ $profile->id }});">
                    Usuń
                </button>
            </div>
            <script>
                function confirmAndDelete(profileId) {
                    if (confirm('Czy na pewno chcesz usunąć ten profil?')) {
                        document.getElementById('deleteProfileForm-' + profileId).submit();
                    }
                }
            </script>
        @endif
        @if (Auth::user()->role_id === 3 && $profile->open_recruitment)
            <div class="card-text col-12 col-lg-11">
                <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal"
                    data-bs-target="#paymentModal">Wpłać wpisowe</button>
            </div>
            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('candidate.payTheEntryFee') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="paymentModalLabel">Wpłać wpisowe</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="paymentAmount" class="form-label">Wprowadź kwotę z zakresu od 0,01 do
                                        999,99.</label>
                                    <input type="number" class="form-control" id="paymentAmount" name="amount"
                                        min="0.01" max="999.99" step="0.01" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                                <button type="submit" class="btn btn-success">Potwierdź</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
