<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use argabe\grid\
{
    IGridTableProvider, IGridFormProvider
};
use App\traits\TGrid;
use App\traits\TModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model implements IGridTableProvider, IGridFormProvider
{
    use TGrid;
    use TModel;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:sP';

    public $user;

    /**
     * The Company`s many to many Users Relationship.
     * The second set of parameters indicates which table is used for the relationship.
     * The third set of parameters (external key) is used to store data for Company`s id.
     * The fourth set of parameters (external key) is used to store data for Users`s id.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'company_user', 'company_id', 'user_id');
    }

    /**
     * The list of Company`s data fields, required for displaying data in the layout
     *
     * @return array
     */
    public function gridFields(): array
    {
        return [
            'company_name' => 'Компания',
            'user'         => 'Пользователи',
            'created_at'   => 'Дата создания',
        ];
    }
}
