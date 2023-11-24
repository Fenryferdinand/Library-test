<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
</head>

<body class="{{ $class ?? '' }}">

    @guest
        @yield('content')
    @endguest

    @auth
        <div class="position-absolute w-100 min-height-300 top-0"
            style="background-image: url('https://images.unsplash.com/photo-1568667256549-094345857637?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8bGlicmFyeXxlbnwwfHwwfHx8MA%3D%3D'); background-position-y: 50%;">
            <span class="mask bg-primary opacity-6"></span>
        </div>
        @include('layouts.navbars.auth.sidenav')
        <main class="main-content border-radius-lg">
            @if (session('success'))
                <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1000">
                    <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-primary">
                            <strong class="me-auto text-white">Notification</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-dark">
                            {{ session('success') }}
                        </div>
                    </div> 
                </div>
            @endif
            @if (session('error'))
                <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1000">
                    <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <strong class="me-auto text-white">Notification</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" id="btn-toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-dark">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
        @include('components.fixed-plugin')
    @endauth
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/argon-dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('.toast-container .toast').show();
            $('.toast-container .btn-close').on('click', function() {
                $(this).closest('.toast-container').find(".toast").hide();
            });
        })
    </script>
    @stack('js');
</body>

</html>
