<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Validator;

use App\Company;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = new User;

        return view('user.users', ['provider' => $provider, 'users' => $provider->with('companies')->get()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $provider = new User;

        if ($request->isMethod('post'))
        {
            $rules = $provider->rules();

            $rules['password'] = 'required|min:6';

            $data = $request->all();

            $validator = Validator::make($data, $rules);

            $provider->loadData($data);

            if ($validator->fails())
            {
                $provider->setErrors($validator->messages()->toArray());
            }
            else
            {
                $provider->password = bcrypt($provider->password);

                if ($provider->save())

                    $this->attachCompany($provider);

                return redirect('user');
            }
        }

        return view('user.create', ['provider' => $provider]);
    }

    protected function attachCompany(User $provider)
    {
        $provider->companies()->sync($provider->company);

        return $this;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provider = User::with('companies')->find($id);

        if ($request->isMethod('post'))
        {
            $rules = $provider->rules();

            $data = $request->all();

            $validator = Validator::make($data, $rules);

            $provider->loadData($data);

            if ($validator->fails())
            {
                $provider->setErrors($validator->messages()->toArray());
            }
            else
            {
                if (empty($provider->password))

                    unset($provider->password);

                else $provider->password = bcrypt($provider->password);

                if ($provider->save())

                    $this->attachCompany($provider);

                return redirect('user');
            }
        }

        return view('user.create', ['provider' => $provider]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($user = User::find($id))

            $user->delete();

        return back();
    }
}
