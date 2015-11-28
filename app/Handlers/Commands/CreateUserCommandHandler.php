<?php

namespace App\Handlers\Commands;

use Event;
use App\Commands\CreateUserCommand;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\CreateUserEvent;

class CreateUserCommandHandler
{
    public function handle(CreateUserCommand $command)
    {
        $user = \App\User::create([
            'username' => $command->username,
            'password' => $command->password
        
        ]);

        $event = new CreateUserEvent($user);
        Event::fire($event);
        return $user;
    }
}
