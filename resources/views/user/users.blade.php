@extends('layout.app')

@section('title', 'Список пользователей')

@section('content')

    @php

        use App\lib\grid\GridTable;
        use App\lib\grid\GridDataProvider;
        use App\lib\grid\GridData;

        $dataProvider = (new GridDataProvider($provider))
            //->setData()
            ->setDataProvider((new GridData)
                ->setPdo(DB::connection()->getPdo())
                ->setTable('users')
                ->setLocale('ru'))
            ->fetchData()
            ->appendData([
                'fields' => [
                    'company' => 'Company'
                ],
                'inputTypes'     => [
                    'company'    => 'text',
                ],
                'safeFields' => [
                    'password',
                    'deleted_at',
                    'email_verified_at',
                    'remember_token'
                ]
            ])
        ;

        $table = (new GridTable($dataProvider))

            ->setPluginConfig('bulk_actions', ['view' => false, 'set_query' => false])

            ->setPlugin('pagination', false)

            ->setProviderItems($users)

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
