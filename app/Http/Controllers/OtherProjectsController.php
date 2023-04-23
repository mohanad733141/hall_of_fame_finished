<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project_categories;
use App\Models\Projects;




use App\Repository\ProjectsRepository;
use App\Repository\category;

class OtherProjectsController extends Controller
{

    public $project;
    public $category;

    public function __construct(ProjectsRepository $project, category $category)
    {
        $this->project = $project;
        $this->category = $category;
    }


    public function index()
    {

        $project_categories = $this->category->getAllCategories();
        $projects = $this->project->getPaginateProjects(12);
        return view('otherProjects.index', compact('projects', 'project_categories'));
    }


    //add search function
    public function search(Request $request)
    {
        $query = $request->input('query');

        $project_catagory = $request->input('project_catagory');

        $project_categories = $this->category->getAllCategories();

        $searched_project =  Projects::where('project_title', 'like', "%$query%")->where('project_category', 'like', "%$project_catagory%")->get();

        return view('otherProjects.search', compact('searched_project', 'project_categories'));
    }
}
