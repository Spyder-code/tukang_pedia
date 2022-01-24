<?php

namespace App\Repositories;

use App\Models\District;

class DistrictService extends Repository
{

    public function __construct()
    {
        $this->model = new District();
    }

}
