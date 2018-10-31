<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the Companies.
     *
     * @param Company $provider
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Company $provider)
    {
        return view('company.companies', ['provider' => $provider, 'companies' => $provider->with('users')->get()->all()]);
    }
}
