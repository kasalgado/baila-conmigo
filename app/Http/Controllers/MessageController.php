<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Services\MessageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class MessageController extends Controller
{
    public function index(Request $request, MessageService $messageService): Response
    {
        $filters = $request->only([
            'action',
        ]);
        $messages = Message::filters($filters)->get();

        return Inertia::render('Message/MessageIndex', [
            'messages' => $messageService->prepared($messages),
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
        Message::create($request->validate([
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
            'user' => Auth::user(),
        ]);
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('message.index')->with('success', 'Mensaje borrado');
    }
}
