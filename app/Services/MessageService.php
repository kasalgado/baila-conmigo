<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class MessageService
{
    public function getReceived(User $user): Collection
    {
        $messages = $messages = Message::where(['to_user_id' => $user->id])->get();

        foreach ($messages as $key => $message) {
            $messages[$key]->from_user_id = User::find($message->from_user_id);
        }

        return $messages;
    }

    public function getSent(User $user): Collection
    {
        $messages = Message::where(['from_user_id' => $user->id])->get();

        foreach ($messages as $key => $message) {
            $messages[$key]->from_user_id = User::find($message->to_user_id);
        }

        return $messages;
    }
}
