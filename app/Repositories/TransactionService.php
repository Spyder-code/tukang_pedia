<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionService extends Repository
{

    public function __construct()
    {
        $this->model = new Transaction;
    }
}