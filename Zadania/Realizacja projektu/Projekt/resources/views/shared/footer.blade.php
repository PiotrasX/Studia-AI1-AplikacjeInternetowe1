<style>
    html[data-bs-theme='light'] .text-color {
        color: #575757;
    }

    html[data-bs-theme='light'] .text-icon-color {
        color: #575757;
    }

    html[data-bs-theme='light'] .text-icon-color:hover {
        color: #0d6efd;
    }

    html[data-bs-theme='dark'] .text-color {
        color: #b5b7b8;
    }

    html[data-bs-theme='dark'] .text-icon-color {
        color: #b5b7b8;
    }

    html[data-bs-theme='dark'] .text-icon-color:hover {
        color: #cad6cc;
    }

    html[data-bs-theme='light'] .bg-color {
        background-color: #e4f1fe;
    }

    html[data-bs-theme='dark'] .bg-color {
        background-color: #2b3035;
    }
</style>

<footer class="container-fluid bg-color {{-- {{ $fixedBottom ?? 'fixed-bottom' }} --}}">
    <div class="container">
        <div class="row text-center my-2">
            <div class="col-md-4 py-2">
                <span class="text-color">&copy; Akademia Nauki &ndash; 2024</span>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-center">
                    <a href="https://facebook.com" target="_blank" class="text-decoration-none mx-2">
                        <i class="bi bi-facebook text-icon-color" style="font-size: 24px;"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="text-decoration-none mx-2">
                        <i class="bi bi-twitter text-icon-color" style="font-size: 24px;"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="text-decoration-none mx-2">
                        <i class="bi bi-instagram text-icon-color" style="font-size: 24px;"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="text-decoration-none mx-2">
                        <i class="bi bi-linkedin text-icon-color" style="font-size: 24px;"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4 py-2 px-0">
                <a href="mailto:akademia.nauki@kontakt.com" class="text-decoration-none text-icon-color">
                    <i class="bi bi-envelope-fill"></i> akademia.nauki@kontakt.com
                </a>
            </div>
        </div>
    </div>
</footer>

{{-- <script>
    window.onload = function(e) {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
        })
        toastList.forEach(toast => toast.show())
    }
</script> --}}
