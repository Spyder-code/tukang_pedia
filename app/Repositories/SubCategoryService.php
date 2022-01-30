<?php

namespace App\Repositories;

use App\Models\SubCategory;

class SubCategoryService extends Repository
{

    public function __construct()
    {
        $this->model = new SubCategory;
    }

    public function select()
    {
        return $this->model->all()->where('category_id',1)->pluck('name', 'id');
    }
}
