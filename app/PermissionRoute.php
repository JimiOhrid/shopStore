<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRoute extends Model
{
    /**
     * Fillable fields for a permission_route table.
     *
     * @var array
     */
    protected $fillable=[
        'route'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission_route';

}
