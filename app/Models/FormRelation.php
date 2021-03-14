<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormRelation extends Model
{
    protected $fillable = ['user_id'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'form_relation_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opening_hours()
    {
        return $this->manyRelation(OpeningHour::class, 'opening_hours');
    }
}
