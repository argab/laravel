<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\lib\grid\
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

    public function users()
    {
        return $this->belongsToMany('App\User', 'company_user', 'company_id', 'user_id');
    }

    public function gridFields(): array
    {
        return [
            'company_name' => 'Компания',
            'user'         => 'Пользователи',
            'created_at'   => 'Дата создания',
        ];
    }
}
