<?php

namespace App\Repositories;

use App\Models\Review;

class ReviewService extends Repository
{

    public function __construct()
    {
        $this->model = new Review;
    }
}