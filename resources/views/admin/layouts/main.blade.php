<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/dashboard.css">

    @stack('style-source')

    <link rel="icon" type="image/png" href="/img/credit.png">
    <title class="text-white">{{ $title }}</title>
    @livewireStyles
</head>

<body onload="loader()">
    <div class="preloader">
        <div class="loading">
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden"></span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
                <span class="visually-hidden"></span>
            </div>
            <div class="spinner-grow text-success" role="status">
                <span class="visually-hidden"></span>
            </div>
            <div class="spinner-grow text-danger" role="status">
                <span class="visually-hidden"></span>
            </div>
            <div class="spinner-grow text-warning" role="status">
                <span class="visually-hidden"></span>
            </div>
            <div class="spinner-grow text-info" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
    </div>

    @include('admin.layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-beetwen flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="text-white">{{ $title }}</h2>
                </div>
                @yield('konten')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="/js/dashboard.js"></script>

    @stack('script-source')

    @livewireScripts
</body>

</html>

<script>
    function loader() {
        setTimeout(function() {
            $('.preloader').fadeOut()
        }, 100);
    };
</script>

@stack('script')
