@extends('layout.app')

@section('title', 'Острова')

@section('content')

<div id="matrix"></div>

@verbatim

    <script>

        const matrix = new Matrix({test2: '123123'});

        console.log(matrix.setMatrix().matrix);

//        console.log(5,5);

    </script>

@endverbatim

@endsection
