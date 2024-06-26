<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'firstname',
        'lastname',
        'birthday',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function fromUser(): HasOne
    {
        return $this->hasOne(Message::class);
    }

    public function toUser(): HasOne
    {
        return $this->hasOne(Message::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class)->latest();
    }

    public function scopeCreatedAt(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }

    public function scopeIsNotAdmin(Builder $query): Builder
    {
        return $query->where('is_admin', false);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when(
                isset($filters['username']) ? $filters['username'] : null,
                fn ($query, $value) => $query->where('username', 'like', '%' . $value . '%')
            )
            ->when(
                isset($filters['maximum']) ? date('Y-m-d', strtotime($filters['maximum'] . ' years ago')) : null,
                fn ($query, $value) => $query->where('birthday', '>=', $value)
            )
            ->when(
                isset($filters['minimum']) ? date('Y-m-d', strtotime($filters['minimum'] . ' years ago')) : null,
                fn ($query, $value) => $query->where('birthday', '<=', $value)
            );
    }
}
