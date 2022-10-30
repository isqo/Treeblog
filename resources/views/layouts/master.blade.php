<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="https://github.com/isqo">
  <!--  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    @isset($currentSection)
        <title>{{ $currentSection->name }}</title>
    @endisset

    <link rel="shortcut icon" href="{{ asset('img/icons8-anonymous-mask.png') }}">
    <link rel="icon" href="{{ asset('img/icons8-anonymous-mask.png') }}">
    <link href="{{ asset('css/spectre.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spectre-exp.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spectre-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/docs.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
</head>
<body>

@yield('content')
<script>
    $('#summernote').summernote({
        tabsize: 2
    });

    $("html").click(function () {
        $(".toast-error").fadeOut();
    })
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
@yield('javascript')
</body>
</html>
