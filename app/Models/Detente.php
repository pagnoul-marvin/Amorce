<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detente extends Model
{
    /** @use HasFactory<\Database\Factories\DetenteFactory> */
    use HasFactory;

    protected $fillable = [
      'starting_at'
    ];

    protected function casts(): array
    {
        return [
            'starting_at' => 'date:d M Y',
        ];
    }
}
