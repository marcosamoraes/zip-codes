<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Settlement extends Model
{
    protected $table = 'settlements';

    protected $fillable = [
        'zip_code_id',
        'type',
        'name',
        'zone'
    ];

    public function zipCode(): BelongsTo 
    {
        return $this->belongsTo(ZipCode::class);
    }
}
