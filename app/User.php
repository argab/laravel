<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use gdgrid\gd\
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

    public $company;

    protected $filterRules = [
        'id'        => '=',
        'user_name' => 'like',
        'email'     => 'like',
    ];

    /**
     * The Users many to many Companies Relationship.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany('App\Company');
    }

    /**
     * Fetches the list of companies to which specified user has related to.
     * Used for filtering data in the layout, edit / create forms.
     * @return array
     */
    public function getCompanies()
    {
        $data = [];

        foreach ($this->companies->all() as $company)
        {
            $data[$company->id] = $company->company_name;
        }

        return $data;
    }

    /**
     * The validation rules
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required|max:255',
            'email'     => sprintf('email|required|unique:users,email%s|max:255',
                false == empty($this->id) ? ',' . $this->id : null
            ),
        ];
    }

    /**
     * The list of User`s data fields, required for displaying data in the layout
     * @return array
     */
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

    /**
     * List of fields required for generating input fields with specified input types,
     * in the edit / create / filter forms.
     * @return array
     */
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

    /**
     * List of fields required for generating input fields of the type "select, checkbox, radio",
     * indicating what data they use, in the edit / create forms.
     * @return array
     */
    public function gridInputOptions(): array
    {
        return [
            'company' => Company::all()->pluck('company_name', 'id')->all()
        ];
    }

    /**
     * The property is used to display errors that occurred during the validation of data fields.
     * @return array
     */
    public function gridInputErrors(): array
    {
        return $this->_errors;
    }
}
