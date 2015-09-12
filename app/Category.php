<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * Massasignable fields of the category model.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * The database table name.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Returns all the methods from this category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

}
