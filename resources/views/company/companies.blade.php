@extends('layout.app')

@section('title', 'Список Компаний')

@section('content')

    @php

        use gdgrid\gd\GridTable;

        $table = (new GridTable($provider))->loadColumns();

        $table->disableEmbedPlugins();

        $table->setProviderItems($companies)

            ->setCell('user', function($data)
            {
                $users = [];

                foreach ($data->users->all() as $item)
                {
                    $users[] = $item->user_name;
                }

                return join(';<br>', $users);

            });

        echo $table->render();

    @endphp

    <div>
        <a class="btn btn-success" href="/user/create">Добавить пользователя</a>
    </div>

@endsection
