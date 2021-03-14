<?php

namespace App\Models;

use Ignite\Crud\Models\Traits\HasMedia as TraitsHasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;

class FormIndexTable extends Model implements HasMedia
{
    use HasFactory, TraitsHasMedia;

    public $table = 'form_index_table_items';

    protected $fillable = ['title'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function getImageAttribute()
    {
        return $this->getMedia('image')->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSuccess($query)
    {
        $query->whereState('success');
    }

    public function scopePending($query)
    {
        $query->whereState('pending');
    }

    public function scopeFailed($query)
    {
        $query->whereState('failed');
    }
}
