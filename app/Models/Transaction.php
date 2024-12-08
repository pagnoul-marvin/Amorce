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
        'date',
        'note',
        'amount',
        'fund_id'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date:d F Y',
        ];
    }
    public function fund(): belongsTo
    {
        return $this->belongsTo(Fund::class);
    }
}
