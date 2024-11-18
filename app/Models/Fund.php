<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fund extends Model
{
    /** @use HasFactory<\Database\Factories\FundFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'amount',
        'pourcentage',
        'enclosed',
    ];
}
