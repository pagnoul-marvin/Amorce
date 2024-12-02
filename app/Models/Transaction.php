<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'from_fund_id',
        'to_fund_id',
        'amount',
    ];

    public function fromFund(): BelongsTo
    {
        return $this->belongsTo(Fund::class, 'from_fund_id');
    }

    public function toFund(): BelongsTo
    {
        return $this->belongsTo(Fund::class, 'to_fund_id');
    }
}
