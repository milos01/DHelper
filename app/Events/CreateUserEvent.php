<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreateUserEvent extends Event
{
    use SerializesModels;
    public $user;
    public function __construct(\App\User $user)
    {
        $this->user =  $user;
    }


}
