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
                $company = [];

                foreach ($data->companies->all() as $item)
                {
                    $company[] = $item->company_name;
                }

                return join(';<br>', $company);
            })

            ->replaceColumns(['company' => 'user_name']);

        echo $table->render();

    @endphp

    <div>
        <a class="btn btn-success" href="/user/create">Добавить пользователя</a>
        <a class="btn btn-info" href="/company">Список Компаний</a>
    </div>

@endsection
