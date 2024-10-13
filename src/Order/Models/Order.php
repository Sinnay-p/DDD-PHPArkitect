<?php

namespace App\Order\Models;

use App\User\Models\User;

class Order
{
    private User $user;
    
    public function __construct()
    {
        $this->user  = new User();


    }
}
