<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'provider', 'amount', 'state', 'shipping_price',
        'billing_address_first_name',
        'billing_address_last_name',
        'billing_address_company',
        'billing_address_street',
        'billing_address_zip',
        'billing_address_city',
        'billing_address_state',
        'billing_address_country',
    ];

    /**
     * Attributes to be appended.
     *
     * @var array
     */
    protected $appends = [
        'readable_created_at',
        'readable_amount',
        'readable_subtotal',
        'readable_shipping_price',
        'state_badge',
    ];

    /**
     * `readable_created_at` attribute getter.
     *
     * @return string
     */
    public function getReadableCreatedAtAttribute()
    {
        // e.g.: "5h January 2021"
        return $this->created_at->isoFormat('Do MMMM OY');
    }

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
     * Unique products.
     *
     * @return BelongsToMany
     */
    public function unique_products(): BelongsToMany
    {
        return $this
            ->belongsToMany(Product::class)
            ->distinct('products.id')
            ->addSelect([
                'quantity' => DB::table('order_product', '_p')
                    ->select(DB::raw('COUNT(*)'))
                    ->whereColumn('order_product.order_id', '_p.order_id')
                    ->whereColumn('order_product.product_id', '_p.product_id'),
            ]);
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

    public function getReadableAmountAttribute()
    {
        if ($this->amount) {
            return readable_money($this->amount, 'EUR', 'de_DE');
        }
    }

    public function getStateBadgeAttribute()
    {
        return match($this->state) {
            'success'  => '<div class="badge badge-success">success</div>',
            'canceled' => '<div class="badge badge-danger">canceled</div>',
            'pending'  => '<div class="badge badge-info">pending</div>',
        };
    }

    public function getReadableSubtotalAttribute()
    {
        if ($this->subtotal) {
            return readable_money($this->subtotal, 'EUR', 'de_DE');
        }
    }

    public function getReadableShippingPriceAttribute()
    {
        if ($this->shipping_price) {
            return readable_money($this->shipping_price, 'EUR', 'de_DE');
        }
    }
}
