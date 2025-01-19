<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'category',
    ];

    public function casts(): array
    {
        return [
            'date' => 'date:d M Y',
        ];
    }

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class, TaskUser::class)->withTimestamps();
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}


