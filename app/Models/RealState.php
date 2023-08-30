<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RealState extends Model
{
    use HasFactory;

    protected $table = 'real_state';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'price',
        'slug',
        'bedrooms',
        'bathrooms',
        'property_area',
        'total_property_area'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
