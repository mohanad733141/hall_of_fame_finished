<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\project_categories;

use App\interfaces\CategoryInterface;


class category implements CategoryInterface{

    public function getAllCategories()
    {

        return project_categories::all();

    }


}
