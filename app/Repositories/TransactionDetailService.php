<?php

namespace App\Repositories;

use App\Models\TransactionDetail;

class TransactionDetailService extends Repository
{

    public function __construct()
    {
        $this->model = new TransactionDetail;
    }

    public function updatePaymentMethod($id, $data)
    {
        $transactionDetail = $this->model->find($id);
        $transactionDetail->payment_method = $data;
        $transactionDetail->save();
        return $transactionDetail;
    }
}
