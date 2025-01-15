<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enum\TaskCategories;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'picture',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function getTasksForTheDay(Carbon $date = null)
    {
        $date = $date ?? Carbon::today();
        return $this->tasks()
            ->where('date', $date)
            ->whereIn('category', [TaskCategories::Todo->value, TaskCategories::InProgress->value])
            ->with('users');
    }

    public function getAssignedTasksForTheDay(Carbon $date = null)
    {
        $date = $date ?? Carbon::today();
        return $this->belongsToMany(Task::class, 'task_users')
            ->where('date', $date)
            ->whereIn('category', [TaskCategories::Todo->value, TaskCategories::InProgress->value])
            ->with('users');
    }
}
