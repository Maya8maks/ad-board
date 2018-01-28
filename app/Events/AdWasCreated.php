<?php

namespace App\Events;
use App\Advert;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AdWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
public $ad;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    /**
     * Method description...
     * AdWasCreated constructor.
     * @param Advert $ad
     */
    public function __construct(Advert $ad)
    {
        $this->ad=$ad;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
