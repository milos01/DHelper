<?php

namespace App\Commands;


use Illuminate\Contracts\Bus\SelfHandling;

class CreateUserCommand 
{
    public $username;
    public $password;
   

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        
    }

}
