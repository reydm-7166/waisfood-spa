<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Ramsey\Collection\Collection;
use App\Models\User;

class NewMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * Create a new event instance.
     */
    protected $user_data;
    public function __construct(
        public $message,
    )
    {
        $this->user_data = User::find($this->message->user_id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     */
    public function broadcastOn(): Channel
    {
        return new Channel('message');
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->id,
            'user_id' => $this->message->user_id,
            'recipient_id' => $this->message->recipient_id,
            'content' => $this->message->content,
            'read_at' => $this->message->read_at,
            'created_at' => $this->message->created_at,
            'updated_at' => $this->message->updated_at,
            'user' => [
                'id' => $this->user_data->id,
                'firstname' => $this->user_data->firstname,
                'lastname' => $this->user_data->lastname,
                'email' => $this->user_data->email_verified_at,
                'unique_id' => $this->user_data->unique_id,
                'username' => $this->user_data->username,
                'age' => $this->user_data->age,
            ],
        ];
    }

}
