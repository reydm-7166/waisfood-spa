<?php


namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class MessageServices {
    public function __construct(
        protected Message $message,
        protected User $user,
    )
    {}

    public function getMessagesById($recipient_id) : array|Collection
    {
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
}