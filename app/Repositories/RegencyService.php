<?php

namespace App\Repositories;

use App\Models\Regency;

class RegencyService extends Repository
{

    public function __construct()
    {
        $this->model = new Regency();
    }

}
