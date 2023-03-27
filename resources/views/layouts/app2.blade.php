<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEKOLAH VOKASI | @yield('title')</title>

    <link rel="stylesheet" href="tmp_dashboard2/dist/assets/css/main/app.css">
    <link rel="stylesheet" href="tmp_dashboard2/dist/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="tmp_dashboard2/dist/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="tmp_dashboard2/dist/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="tmp_dashboard2/dist/assets/css/shared/iconly.css">

</head>

<body>
    <div id="app">

        @include('component.sidebar2')
        @include('component.navbar2')
        <div id="main"style="margin-left:0px">

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>@yield('fitur')</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="container">
                        <div class="card">
                            
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; SEKOLAH VOKASI UNS</p>
                    </div>

                </div>
            </footer>
        </div>
    </div>
    <script src="tmp_dashboard2/dist/assets/js/bootstrap.js"></script>
    <script src="tmp_dashboard2/dist/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="tmp_dashboard2/dist/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="tmp_dashboard2/dist/assets/js/pages/dashboard.js"></script>

</body>

</html>
