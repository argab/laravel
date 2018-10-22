<!doctype html>
<html  lang="ru">
<head>
<script src="{!! asset('css/app.css') !!}"></script>
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