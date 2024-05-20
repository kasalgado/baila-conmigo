<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'from_user_id',
        'to_user_id',
    ];

    public function scopeFilters(Builder $query, array $filters): Builder
    {
        return $query
            ->when(
                $filters['action'] ?? 'to_user_id',
                fn ($query, $value) => $query->where($value, Auth::user()->id)
            );
    }
}
