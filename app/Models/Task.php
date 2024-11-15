<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'completed',
    ];

    public function casts(): array
    {
        return [
            'date' => 'date:d M Y',
        ];
    }

    public function users():belongsToMany
    {
        return $this->belongsToMany(User::class, TaskUser::class);
    }
}


