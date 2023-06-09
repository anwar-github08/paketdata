<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="icon" type="image/png" href="img/credit.png">
    <title>PaketData | Login</title>

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: rgb(228, 233, 247);
        }

        .form-signin {
            max-width: 400px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        /* footer */
        .footer {
            font-size: 13px
        }

        .footer img {
            width: 16px
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-me {
            background-color: rgb(87, 108, 163);
            color: white;
            width: 49%;
        }

        .btn-me:hover,
        .btn-me:focus {
            background-color: rgb(63, 90, 159);
            color: white;
        }

        /* seukuran hp */
        @media only screen and (max-width: 768px) {
            body {
                font-size: 12px
            }

            .btn-me {
                font-size: 14px
            }

            .footer {
                font-size: 10px
            }

            .footer img {
                width: 14px
            }
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        {{-- <a href="/daftarHargaPublik">
            <img class="mb-4" src="/img/credit.png" alt="" width="80">
        </a> --}}

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <form action="/login" method="POST">
            @csrf
            <div class="form-floating mb-2">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Username" autocomplete="off" required value="{{ old('email') }}" autofocus>
                <label>Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Password" autocomplete="off" required>
                <label>Password</label>
            </div>

            <button class="btn btn-lg btn-me" type="submit">Sign in</button>
            <a href="/" onclick="return confirm('batal..?')" class="btn btn-lg btn-me">Batal</a>
        </form>

        <p class="mt-5 mb-3 footer">
            <em class="white fs">&copy; 2022
                anwar08. <strong>Made With &nbsp;<img src="/img/heart.png" alt="heart"></strong>
            </em>
        </p>
    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
