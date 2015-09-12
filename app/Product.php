<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recommended',
        'category_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeRecommended($query)
    {
        return $query->where('recommended', '=', true);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeAll($query)
    {
        return $query->where();
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeOfCategory($query, $id)
    {
        return $query->where('category_id', '=', $id);
    }

    /**
     * Create a new attribute of name with description.
     *
     * @return string
     */
    public function getNameDescriptionAttribute()
    {
        return $this->name . ' - ' . $this->description;
    }
}
