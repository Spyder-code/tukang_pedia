<?php

namespace App\Repositories;

use App\Models\Province;

class ProvinceService extends Repository
{

    public function __construct()
    {
        $this->model = new Province();
    }

    public function select()
    {
        return $this->model->all()->pluck('name','id');
    }
}
