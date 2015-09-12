<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Massasignable fields of the order model.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    /**
     * The status in which an order can be.
     *
     * @var array
     */
    public $statusDescription = [
        0 => 'Request sent',
        1 => 'Waiting for payment',
        2 => 'Under Analysis',
        3 => 'Pay',
        4 => 'Available',
        5 => 'Returned',
        6 => 'Cancelled',
    ];

    /**
     * Returns the order items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    /**
     * Returns the order buyer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Scope that returns the order status.
     *
     * @return mixed
     */
    public function scopeStatus()
    {
        return $this->statusDescription[$this->status];
    }

    /**
     * Returns the description of the status.
     *
     * @return array
     */
    public function scopeStatusDescriptions()
    {
        return $this->statusDescription;
    }
}
