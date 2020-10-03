<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'provider', 'amount', 'state',
    ];

    /**
     * The user that has created the booking.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The ordered products.
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Filter mollie provider.
     *
     * @param  Builder $query
     * @return void
     */
    public function scopeMollie($query)
    {
        $query->whereProvider('mollie');
    }

    /**
     * Filter stripe provider.
     *
     * @param  Builder $query
     * @return void
     */
    public function scopeStripe($query)
    {
        $query->whereProvider('stripe');
    }

    /**
     * Filter paypal provider.
     *
     * @param  Builder $query
     * @return void
     */
    public function scopePaypal($query)
    {
        $query->whereProvider('paypal');
    }

    /**
     * Filter success state.
     *
     * @param  Builder $query
     * @return void
     */
    public function scopeSuccess($query)
    {
        $query->whereState('success');
    }

    /**
     * Filter canceled state.
     *
     * @param  Builder $query
     * @return void
     */
    public function scopeCanceled($query)
    {
        $query->whereState('canceled');
    }

    /**
     * Filter pending state.
     *
     * @param  Builder $query
     * @return void
     */
    public function scopePending($query)
    {
        $query->whereState('pending');
    }
}
