@extends('layout.app')

@php

    $isRouteCreate = \Route::currentRouteName() == 'user.create';

@endphp

@section('title', $isRouteCreate ? 'Добавление пользователя' : 'Изменение пользователя')

@section('content')

    @php

        use App\lib\grid\GridForm;
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
                'inputOptions' => $provider->gridInputOptions(),
                'inputTypes' => [
                    'company' => 'checkbox'
                ],
                'safeFields'     => [
                    'id',
                    'remember_token',
                    'email_verified_at',
                    'deleted_at',
                    'created_at',
                    'updated_at',
                ],
                'inputErrors' => $provider->gridInputErrors()
            ])
        ;

        #$form = (new GridForm($provider))->loadInputs();

        $form = (new GridForm($dataProvider))->loadInputs();

        $form->setForm(['action' => $isRouteCreate ? '/user/create' : '/user/update/' . $provider->id]);

        $form->setToken(csrf_token());

        $form->setValue('password', '');

        $form->setValue('company', array_keys((array) $provider->getCompanies()));

        $form->setRow('_submit_', '<button type="submit" class="btn btn-success">Сохранить</button>');

        echo $form->render();

    @endphp

@endsection
