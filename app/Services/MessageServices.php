<?php


namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Carbon;

class MessageServices {
    public function __construct(
        protected Message $message,
        protected User $user,
    )
    {}

    public function getConversationList() : array|Collection
    {
        return $this->message
                    ->distinct('recipient_id')
                    ->where('user_id', Auth::id())
                    ->with('recipient')
                    ->get();
    }

    public function getMessagesById($unique_id) : array|Collection
    {
        $recipient_id = $this->user->where('unique_id', $unique_id)->pluck('id')->first();
        return $this->message
            ->with('user')
            ->where(function($query) use ($recipient_id) {
                $query->where('user_id', Auth::id())
                    ->where('recipient_id', $recipient_id);
            })
            ->orWhere(function($query) use ($recipient_id) {
                $query->where('user_id', $recipient_id)
                    ->where('recipient_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function sendMessage($request) : bool
    {
        $insert = $this->message->create([
            'user_id' => Auth::id(),
            'recipient_id' => $request->recipient_id,
            'content' => $request->chat_content,
            'read_at' => now(),
        ]);

        return (bool)$insert;
    }
}
