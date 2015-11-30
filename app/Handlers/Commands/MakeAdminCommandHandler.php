<?php

namespace App\Handlers\Commands;
use Illuminate\Queue\InteractsWithQueue;
use App\Commands\MakeAdminCommand;
use App\User;
class MakeAdminCommandHandler
{
  
    public function handle(MakeAdminCommand $command)
    {
       $user = User::find($command->id);
       $user->isAdmin = 1;
       $user->save();
    }
}
