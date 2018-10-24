<?php

return [

    'get_token' => [
        'url' => 'https://crm.etm-system.com/api/login/8e71ac9f18',
    ],

    'get_search_id' => [
        'url'     => 'https://crm.etm-system.com/api/air/search',
        'body'    => [
            'directions'         => [
                [
                    'departure_code' => '',
                    'arrival_code'   => '',
                    'date'           => '',
                    'time'           => 'M',
                ]
            ],
            'adult_qnt'          => 1,
            'child_qnt'          => 0,
            'infant_qnt'         => 0,
//            'passenger_category' => 'YCD',
            'class'              => '',
            'direct'             => 1,
            'flexible'           => 1,
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
    ],

    'get_offers' => [
        'url'     => 'https://crm.etm-system.com/api/air/offers',
        'body'    => [
            'request_id' => 0,

        ]
    ]

];
