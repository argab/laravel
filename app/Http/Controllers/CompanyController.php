<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompanyController extends Controller
{
    public function index(Company $provider)
    {
        return view('company.companies', ['provider' => $provider, 'companies' => $provider->with('users')->get()->all()]);
    }
}
