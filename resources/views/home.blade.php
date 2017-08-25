<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test links</title>
    <meta name="description" content="This page show visualization of imported test links">
    <meta name="keywords" content="test, links">
    <meta name="robots" content="noindex, nofollow">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <div id="title"></div>

        <h2>Anchor Text</h2>
        <div id="anchor-text"></div>

        <h2>Link Status</h2>
        <div id="link-status"></div>

        <h2>From Url</h2>
        <div id="from-url">Loading...</div>

        <h2>Bldom</h2>
        <div id="bldom"></div>
    </div>
    @include('layouts.footer')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
