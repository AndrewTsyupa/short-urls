<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Short Urls</title>

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap.grid.css" rel="stylesheet">
    <link href="/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>Short Urls</h2>
        <p class="lead"></p>
    </div>

    <div class="row">
        @yield('content')
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Short Urls</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/bootstrap.bundle.js"></script>
<script src="/js/bootstrap-hover-dropdown.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
@yield('js')
</body>
</html>



