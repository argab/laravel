@extends('layout.app')

@section('title', 'Список пользователей')

@section('content')

    @php

        use App\lib\grid\GridTable;

        $table = (new GridTable($provider))

            ->setPluginConfig('bulk_actions', ['view' => false, 'set_query' => false])

            ->setPlugin('pagination', false)

            ->unsetColumn('password')

            ->setItems($users)

            ->setCell('company', function($data)
             {
                return join(';<br>', (array) $data->getCompanies());
             })

            ->replaceColumns(['company' => 'user_name']);

        echo $table->render();

    @endphp

    <div>
        <a class="btn btn-success" href="/user/create">Добавить пользователя</a>
        <a class="btn btn-info" href="/company">Список Компаний</a>
    </div>

@endsection
