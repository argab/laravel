<!doctype html>
<html  lang="ru">
<head>
<link rel="stylesheet" href="{!! mix('css/app.css') !!}">
</head>
<body>

<div class="container">
    <div id="app">
        @yield('content')
    </div>
</div>

<script src="{!! mix('js/app.js') !!}"></script>
</body>
</html>