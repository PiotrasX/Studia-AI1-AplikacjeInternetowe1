@if (session('success'))
    <div class="container mt-5 d-flex justify-content-center">
        <div class="row col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="col mb-0 alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="container mt-5 d-flex justify-content-center">
        <div class="row col-10 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="col mb-0 alert alert-danger text-center">
                {{ session('error') }}
            </div>
        </div>
    </div>
@endif
