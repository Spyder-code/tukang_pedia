<?php

namespace App\Repositories;

use App\Models\TransactionDetail;

class TransactionDetailService extends Repository
{

    public function __construct()
    {
        $this->model = new TransactionDetail;
    }
}