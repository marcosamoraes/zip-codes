<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ZipCode extends Model
{
    protected $table = 'zip_codes';

    protected $fillable = [
        'city_id',
        'zip_code'
    ];

    public function city(): BelongsTo 
    {
        return $this->belongsTo(City::class);
    }

    public function settlements(): HasMany 
    {
        return $this->hasMany(Settlement::class);
    }
}
