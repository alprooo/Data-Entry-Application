<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from technext.github.io/mazer/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 06:37:23 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PPIM</title>

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css" />

    <link rel="stylesheet" href="{{ asset('') }}vendors/iconly/bold.css" />

    <link rel="stylesheet" href="{{ asset('') }}vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('') }}vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/app.css" />
    <link rel="shortcut icon" href="{{ asset('') }}images/favicon.html" type="image/x-icon" />

    @yield('addStyle')

</head>

<body>
    <div id="app">

        @if (Auth::user()->role == 0)
            @include('student.sidebar')
        @else
            @include('admin.sidebar')
        @endif



        <div id="main">

            @include('navbar')

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; PPIM</p>
                    </div>
                    <div class="float-end">
                        <p>
                            Crafted with
                            <span class="text-danger"><i class="bi bi-heart"></i></span> by
                            <a href="http://ppim.co.id/">PPIM</a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script src="{{ asset('') }}vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ asset('') }}js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('') }}vendors/apexcharts/apexcharts.js"></script>
<script src="{{ asset('') }}js/pages/dashboard.js"></script>

<script src="{{ asset('') }}js/main.js"></script>

@yield('addScript')

<!-- Mirrored from technext.github.io/mazer/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 06:37:55 GMT -->

</html>
