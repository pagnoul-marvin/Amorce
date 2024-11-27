<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Donation extends Model
{
    /** @use HasFactory<\Database\Factories\DonationFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'fund_id',
        'communication',
        'amount',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date:d F Y',
        ];
    }
    public function funds(): HasMany
    {
        return $this->hasMany(Fund::class);
    }
}
