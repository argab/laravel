<?php

use App\Api;

return [

    'get_token' => [
        'url' => 'https://crm.etm-system.com/api/login/8e71ac9f18',
    ],

    'get_search_id' => [
        'url'     => 'https://crm.etm-system.com/api/air/search',
        'body'    => [
            'directions'         => [
                [
                    'departure_code' => null,
                    'arrival_code'   => null,
                    'date'           => null,
                    'time'           => 'M',
                ]
            ],
            'adult_qnt'          => 1,
            'child_qnt'          => 0,
            'infant_qnt'         => 0,
            'passenger_category' => 'YCD',
            'class'              => null,
            'direct'             => true,
            'flexible'           => true,
            //            'max_price'          => 50,
            //            'airlines'           =>
            //                [
            //                    0 => 'SU',
            //                    1 => 'HR',
            //                ],
            //            'fare_types'         =>
            //                [
            //                    0 => 'PUB',
            //                    1 => 'NEG',
            //                ],
        ]
    ]

];
