<?php

namespace App\Models;

use Ignite\Crud\Models\Traits\HasMedia as HasMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price', 'publish_at', 'state',
    ];

    protected $appends = [
        'preview_image',
        'readable_revenue',
        'readable_price',
    ];

    /**
     * The orders where the product was sold.
     *
     * @return BelongsToMany
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function getImagesAttribute()
    {
        return $this->getMedia('images');
    }

    public function getPreviewImageAttribute()
    {
        return $this->getMedia('images')->first();
    }

    public function scopeWithCustomersCount($query)
    {
        $query->withCount([
            'orders as customers_count' => function ($ordersQuery) {
                $ordersQuery->select(DB::raw('COUNT(DISTINCT(user_id))'));
            },
        ]);
    }

    public function scopeWithRevenue($query)
    {
        $query->withCount([
            'orders as revenue' => function ($ordersQuery) {
                $ordersQuery->select(DB::raw('ROUND(SUM(amount), 2)'));
            },
        ]);
    }

    public function getReadableRevenueAttribute()
    {
        if ($this->revenue) {
            return readable_money($this->revenue, 'EUR', 'de_DE');
        }
    }

    public function getReadablePriceAttribute()
    {
        if ($this->price) {
            return readable_money((float) $this->price, 'EUR', 'de_DE');
        }
    }
}
