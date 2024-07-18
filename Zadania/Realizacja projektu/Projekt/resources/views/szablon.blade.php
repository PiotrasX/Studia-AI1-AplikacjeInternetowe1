@include('shared.html')

@include('shared.head', ['pageTitle' => 'Tytuł'])

<body>
    @include('shared.header')

    @include('shared.session-message')

    <main class="content container my-5">
    </main>

    @include('shared.footer')
</body>

@include('shared.end-html')
