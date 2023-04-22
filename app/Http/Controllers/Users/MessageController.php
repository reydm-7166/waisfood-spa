<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\MessageServices;
use Illuminate\Http\Request;
use Inertia\Response;
use Auth;

class MessageController extends Controller
{
    public function __construct(
        protected MessageServices $messages
    ){}

    public function index(): Response|ResponseFactory
    {
        return Inertia('Users/Message/Index', [
            'conversationList' => $this->messages->getConversationList()
        ]);
    }

    public function show($recipient_id): Response|ResponseFactory
    {
        return Inertia('Users/Message/Index', [
            'messagesConversation' => $this->messages->getMessagesById($recipient_id)
        ]);

    }

    public function store(Request $request)
    {
        $insert = $this->messages->sendMessage($request);
        return redirect()->route('messages.index')->with('insert_success', $insert);

    }
}
