<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MessageController extends Controller
{
    public function index(Request $request): Response
    {
        if ($request->type == 'sent') {
            $messages = Message::where(['from_user_id' => $request->user()->id])->get();
        } else {
            $messages = Message::where(['to_user_id' => $request->user()->id])->get();
        }

        foreach ($messages as $key => $message) {
            $fromUser = User::find($message->from_user_id);
            $messages[$key]->from_user_id = $fromUser;
        }

        return Inertia::render('Message/MessageIndex', [
            'messages' => $messages,
        ]);
    }

    public function create(Request $request): Response
    {
        return Inertia::render('Message/MessageCreate', [
            'from_user_id' => $request->user(),
            'to_user_id' => User::find($request->to_user_id),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $message = Message::create($request->validate([
            'message' => 'required|string|min:50',
            'from_user_id' => 'required|numeric',
            'to_user_id' => 'required|numeric',
        ]));

        return redirect()->route('message.index')->with('success', 'Mensaje enviado');
    }

    public function show(string $id): Response
    {
        $message = Message::find($id);
        $this->authorize('view', $message);

        $message->from_user_id = User::find($message->from_user_id);
        $message->to_user_id = User::find($message->to_user_id);

        return Inertia::render('Message/MessageShow', [
            'message' => $message,
        ]);
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('message.index')->with('success', 'Mensaje borrado');
    }
}
