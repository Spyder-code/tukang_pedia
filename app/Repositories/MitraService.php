<?php

namespace App\Repositories;

use App\Models\Mitra;

class MitraService extends Repository
{

    public function __construct()
    {
        $this->model = new Mitra;
    }
}