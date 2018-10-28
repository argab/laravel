<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Api;

class ApiController extends Controller
{
    private $_api;

    public function __construct(Api $api)
    {
        $this->_api = $api->setAuthUrl(config('api.get_token.url'))->checkToken();
    }

    public function index()
    {
        return view('api.api');
    }

    public function search(Request $request)
    {
        $body = array_merge(config('api.get_search_id.body'), [
            'directions' => [[
                'departure_code' => $request->post('flight_from'),
                'arrival_code'   => $request->post('flight_to'),
                'date'           => Carbon::createFromFormat('d/m/Y', $request->post('flight_date'))->format('Y-m-d'),
                'time'           => 'M',
            ]],
            'class'      => $request->post('flight_class'),
        ]);

        return response()->json($this->_api->curlPost(config('api.get_search_id.url'), $body));
    }

    public function getOffers(Request $request)
    {
        $res = $this->_api->curlGet(config('api.get_offers.url'), array_merge(

            config('api.get_offers.body'), ['request_id' => $request->get('request_id')]

        ));

        if ($res['status'] === 'InProcess')

            return response()->json(null, 500);

        return response()->json($res);
    }

    public function searchOptions()
    {
        return response()->json([
            'flight'       => config('params.flight'),
            'flight_class' => config('params.flight.class')
        ]);
    }
}
