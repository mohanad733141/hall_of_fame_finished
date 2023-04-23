<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project_categories;
use App\Models\projects;




use App\Repository\ProjectsRepository;
use App\Repository\category;

class HallOfFameController extends Controller
{

    public $project;
    public $category;

    public function __construct(ProjectsRepository $project,category $category)
    {
        $this->project = $project;
        $this->category = $category;
    }


    public function index()
    {
        $project_categories = $this->category->getAllCategories()->where('id', '=', '1');
        $projects = projects::where('project_category', '=', '1')->paginate(12);
        return view('HallOfFame/Index', compact('projects', 'project_categories'));
    }


    //add search function
    public function search(Request $request)
    {
        $query = $request->input('query');

        $project_catagory = $request->input('project_catagory');

        $project_categories = $this->category->getAllCategories()->where('id', '=', '1');

        $searched_project =  projects::where('project_title', 'like', "%$query%")->where('project_category', 'like', "1")->get();

        return view('HallOfFame.search', compact('searched_project', 'project_categories'));
    }
}
