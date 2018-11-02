<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the Users.
     *
     * @param User $provider
     * @return \Illuminate\Http\Response
     */
    public function index(User $provider)
    {
        return view('user.users', ['provider' => $provider, 'users' => $provider->with('companies')->get()->all()]);
    }

    /**
     * Display the form for creating a new User;
     * Create a new User if the form post data sent.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $provider
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $provider)
    {
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

    /**
     * Attach/Detach the specified User to Company and vice versa.
     *
     * @param User $provider
     *
     * @return $this
     */
    protected function attachCompany(User $provider)
    {
        $provider->companies()->sync($provider->company);

        return $this;
    }

    /**
     * Display the form for updating specified User;
     * Update the specified User in storage if the form post data sent.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
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
