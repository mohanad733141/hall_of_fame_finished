<?php

namespace App\Repository;


use App\Models\Projects;
use App\Models\project_categories;

use App\interfaces\ProjectInterface;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class userProjectsRepository extends ProjectsRepository{

    public function getAllProjects(){

        $user_id =  Auth::user()->id;
        return  projects::where('user_id', $user_id)->get();
    }




}
