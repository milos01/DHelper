<?php

namespace App\Commands;


class MakeAdminCommand 
{
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
}
