<?php

namespace App\Models;

use Ignite\Crud\Models\Traits\HasMedia as HasMediaTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_image',
    ];

    /**
     * The orders created by the user.
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Select "paid_amount".
     *
     * @param  Builder $query
     * @return void
     */
    public function scopeWithPaidAmount($query)
    {
        $query->withCount([
            'orders AS paid_amount' => function ($query) {
                $query->select(DB::raw('SUM(amount) as paidsum'))->where('state', 'success');
            },
        ]);
    }

    public function getProfileImageAttribute()
    {
        return $this->getMedia('profile_image')->first();
    }
}
