<?php

namespace App\Repositories;

use App\Models\Regency;

class RegencyService extends Repository
{

    public function __construct()
    {
        $this->model = new Regency();
    }

    public function select()
    {
        return $this->model->all()->where('province_id',15)->pluck('name','id');
    }
}
