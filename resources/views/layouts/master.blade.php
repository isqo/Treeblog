<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="https://github.com/picturepan2/">
    <title>Getting started - Spectre.css CSS Framework</title>
    <link rel="shortcut icon" href="img\favicons\favicon.ico">
    <link rel="icon" href="img\favicons\favicon.png">
    <link href="{{ asset('css/spectre.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spectre-exp.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spectre-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/docs.css') }}" rel="stylesheet">
    </head>
<body style="">

<div class="docs-container off-canvas off-canvas-sidebar-show">

    @include('layouts.sidebar')

    <a class="off-canvas-overlay" href="#close"></a>

    <div id="content" class="docs-content">

        <div class="container">

            <div class="columns">
                <div class="column col-12">@include('layouts.navbar')</div>
            </div>

            <div class="columns">
                <div class="column col-10 col-mx-auto">@yield('content')</div>
            </div>

        </div>


                <div class="column col-10 col-mx-auto">@include('layouts.footer')</div>


    </div>
</div>
</body>
</html>
