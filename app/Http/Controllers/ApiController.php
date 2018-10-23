<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Api;

class ApiController extends Controller
{
    private $_api;

    public function __construct(Api $api)
    {
        $this->_api = $api->setAuthUrl(config('api.get_token.url'));
    }

    public function index()
    {
        dd($this->_api->curlPost(config('api.get_search_id.url'), config('api.get_search_id.body')));

        return view('api.api');
    }

    public function search(Request $request)
    {


        return response()->json($request->all());
    }

    public function searchOptions()
    {
        return response()->json([
            'flight'       => config('params.flight'),
            'flight_class' => config('params.flight.class')
        ]);
    }
}
