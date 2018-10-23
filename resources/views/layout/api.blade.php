<!doctype html>
<html  lang="ru">
<head>
<link rel="stylesheet" href="{!! asset('css/app.css') !!}">
</head>
<body>

<div class="container">
    <div id="app">
        @yield('content')
    </div>
</div>

<script src="{!! asset('js/app.js') !!}"></script>
</body>
</html>