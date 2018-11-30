@extends('layout.app')

@section('title', 'Список пользователей')

@section('content')

    @php

        use argabe\grid\GridTable;
        use argabe\grid\GridDataProvider;
        use argabe\grid\GridData;
        use argabe\grid\GridForm;
        use Illuminate\Http\Request;

        /* @var $provider \App\User */

        # Для инициализации провайдера напрямую из сущности:
        # $table = (new GridTable($provider))->loadColumns();

        # Либо при подключении несвязанного дата провайдера, который получает данные полей
        # из базы данных и имплементирует методы интерфейса:
        $dataProvider = (new GridDataProvider($provider))
            ->setDataProvider((new GridData)
                ->setPdo(DB::connection()->getPdo())
                ->setTable('users')
                ->setLocale('ru'))
            ->fetchData()
            ->setData([
                'fields' => $provider->gridFields(),
                'inputTypes'     => [
                    'company'    => 'text',
                ],
                'inputOptions' => $provider->gridInputOptions(),
                'safeFields' => [
                    'password',
                    'deleted_at',
                    'email_verified_at',
                    'remember_token',
                    'updated_at',
                ]
            ])
        ;

        $table = (new GridTable($dataProvider))->loadColumns();

        $table->plugin()->setConfig('bulk-actions', ['view' => false, 'set_query' => false]);

        $table->plugin()->hook('filter', function(GridForm $plugin)
        {
            $plugin->loadInputs()->setValues(Request::capture()->all());
        });

        $table->disableEmbedPlugin('pagination');

        $table->setProviderItems($users)

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
