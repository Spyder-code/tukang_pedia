<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryService extends Repository
{

    public function __construct()
    {
        $this->model = new Category;
    }

    public function select()
    {
        return $this->model->all()->pluck('name', 'id');
    }
}