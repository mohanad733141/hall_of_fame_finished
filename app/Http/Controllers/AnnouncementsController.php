<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\User;
use App\Models\Projects;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;
use App\Repository\announcementRepository ;
use App\Repository\ProjectsRepository;

class AnnouncementsController extends Controller
{
    public $announcements;


    public function __construct( announcementRepository  $announcements)
    {
        $this->announcements = $announcements;

    }

    public function index()
    {
        $user = Auth::user();
        $announcements = $this->announcements->getPaginateAnnouncement(4);
        $announcements_num= Announcements::all()->count();
        $project_num= Projects::all()->count();
        $users_num= User::all()->count();
        $messages_num= Messages::all()->count();
        return view('AdminProject.announcements', compact('announcements', 'user','announcements_num', 'project_num', 'users_num', 'messages_num'));
    }



    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'announcements_title' => 'required',
            'announcements_description' => 'required',
        ]);

        $this->announcements->storeAnnouncement($data);

        return redirect()->route('admin.project.announcement')->with('success', 'Project Created Successfully!');
    }


    public function edit($id)
    {
        $user = Auth::user();
        $announcements_num= Announcements::all()->count();
        $project_num= Projects::all()->count();
        $users_num= User::all()->count();
        $messages_num= Messages::all()->count();
        $announcement = $this->announcements->editAnnouncement($id);
        return view('AdminProject\announcements_edit', compact('announcement', 'user', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->validate($request, [
            'announcements_title' => 'required',
            'announcements_description' => 'required',
        ]);

        $this->announcements->updateAnnouncement($id, $data);

        return redirect()->route('admin.project.announcement')->with('success', 'Project Created Successfully!');
    }

    public function destroy($id)
    {
        $this->announcements->deleteMessages($id);

        return redirect()->route('admin.project.announcement')->with('success', 'Project updated Successfully!');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $searched_project =  Announcements::where('announcements_title', 'like', "%$query%")->orwhere('announcements_description', 'like', "%$query%")->get();
        $announcements_num= Announcements::all()->count();
        $project_num= Projects::all()->count();
        $users_num= User::all()->count();
        $messages_num= Messages::all()->count();

        return view('AdminProject.search.announcements_search' , compact('searched_project', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }

}
