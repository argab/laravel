@extends('layout.app')

@php

    $isRouteCreate = \Route::currentRouteName() == 'user.create';

@endphp

@section('title', $isRouteCreate ? 'Добавление пользователя' : 'Изменение пользователя')

@section('content')

    @php

        use App\lib\grid\GridForm;

        $form = new GridForm($provider, ['action' => $isRouteCreate ? '/user/create' : '/user/update/' . $provider->id]);

        $form->setToken(csrf_token());

        $form->unsetInput('created_at');

        $form->setValue('password', '');

        $form->setValue('company', array_keys((array) $provider->getCompanies()));

        $form->setRow('_submit_', '<button type="submit" class="btn btn-success">Сохранить</button>');

        echo $form->render();

    @endphp

@endsection
