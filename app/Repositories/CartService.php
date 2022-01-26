<?php

namespace App\Repositories;

use App\Models\Cart;

class CartService extends Repository
{

    public function __construct()
    {
        $this->model = new Cart;
    }
}