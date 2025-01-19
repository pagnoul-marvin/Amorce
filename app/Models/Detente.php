<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Detente extends Model
{
    /** @use HasFactory<\Database\Factories\DetenteFactory> */
    use HasFactory;

    protected $fillable = [
      'starting_at',
      'ending_at',
    ];

    protected function casts(): array
    {
        return [
            'starting_at' => 'date:d M Y',
            'ending_at' => 'date:d M Y',
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'detente_users')->withTimestamps();
    }

}
