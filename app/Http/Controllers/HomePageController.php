<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\projects;
use App\Repository\ProjectsRepository;
use App\Repository\announcementRepository;

class HomePageController extends Controller{


    public $project;
    public $announcements;

    public function __construct( ProjectsRepository $project,announcementRepository $announcements )
    {
        $this->project = $project;
        $this->announcements = $announcements;
    }

    public function index(){

        $announcements = $this->announcements->getAllAnnouncement()->take(2);
        $announcements_num= $this->announcements->getAllAnnouncement()->count();
        $project_num= $this->project->getAllProjects()->count();
        $users_num= User::all()->count();
        $projects = $this->project->getAllProjects()->take(6);
        $HallOfFameProjects = projects::where('project_category', '=', 1)->take(6)->get();
        return view('HomePage.Index', compact('projects', 'HallOfFameProjects', 'announcements', 'announcements_num', 'project_num','users_num'));
    }







}
