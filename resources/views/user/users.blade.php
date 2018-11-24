@extends('layout.app')

@section('title', 'Список пользователей')

@section('content')

    @php

        use App\lib\grid\GridTable;
        use App\lib\grid\GridDataProvider;
        use App\lib\grid\GridData;

        /* @var $provider \App\User */

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

        #$table = (new GridTable($provider))->loadColumns();

        $table = (new GridTable($dataProvider))->loadColumns();

        $table->plugin()->setConfig('bulk_actions', ['view' => false, 'set_query' => false]);

        $table->plugin()->setComponent('pagination', null);

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
