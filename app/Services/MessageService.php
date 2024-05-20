<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class MessageService
{
    public function prepared(Collection $messages): Collection
    {
        foreach ($messages as $key => $message) {
            $messages[$key]->from_user_id = User::find($message->from_user_id);
            $messages[$key]->to_user_id = User::find($message->to_user_id);
            $messages[$key]->action = $filters['action'] ?? 'to_user_id';
        }

        return $messages;
    }
}
