<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\lib\grid\
{
    IGridTableProvider, IGridFormProvider
};
use App\traits\TGrid;
use App\traits\TModel;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Company;

class User extends Authenticatable implements IGridTableProvider, IGridFormProvider
{
    use Notifiable;
    use TGrid;
    use TModel;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password', 'company'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dateFormat = 'Y-m-d H:i:sP';

    private $_errors = [];

    public $company;

    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }

    public function getCompanyAttribute()
    {
        $this->company = [];

        foreach ($this->companies->all() as $company)
        {
            $this->company[] = $company->id;
        }

        return $this->company;
    }

    public function rules()
    {
        return [
            'user_name' => 'required|max:255',
            'email'     => sprintf('email|required|unique:users,email%s|max:255',
                false == empty($this->id) ? ',' . $this->id : null
            ),
        ];
    }

    public function gridFields(): array
    {
        return [
            'user_name'  => 'Имя',
            'company'    => 'Компания',
            'email'      => 'Email',
            'password'   => 'Пароль',
            'created_at' => 'Дата регистрации',
        ];
    }

    public function gridInputTypes(): array
    {
        return [
            'id'         => 'hidden',
            'user_name'  => 'text',
            'company'    => 'checkbox',
            'email'      => 'text',
            'password'   => 'password',
            'created_at' => 'text',
        ];
    }

    public function gridInputOptions(): array
    {
        return [
            'company' => Company::all()->pluck('company_name', 'id')->all()
        ];
    }

    public function setErrors(array $errors)
    {
        $this->_errors = $errors;
    }

    public function gridInputErrors(): array
    {
        return $this->_errors;
    }
}
