<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    /**
     * Massasignable fields
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'extension'
    ];

    /**
     * Every products has many images
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
