<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'route',
    ];

    /**
     * The routes that can be referenced bay the role which has this permission
     *
     * @return mixed
     */
    public function routes(){

        return $this->hasMany('App\PermissionRoute');
    }

    /**
     * Many-to-Many relations with Role model.
     *
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'permission_role');
    }

    /**
     * Returns true if the permission belongs to this role given as parameter, otherwise returns false.
     *
     * @param $roleName
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $roleName)
            {
                return true;
            }
        }
        return false;
    }
}
