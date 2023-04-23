<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Repository\messageRepository;

use App\Repository\ProjectsRepository;
use App\Models\Announcements;
use App\Models\User;

class MessagesController extends Controller
{
    public $Messages;
    public $project;


    public function __construct( messageRepository $Messages, ProjectsRepository $project )
    {
        $this->Messages = $Messages;
        $this->project = $project;

    }
    public function index()
    {

        $messages= $this->Messages->getPaginateMessages(4);
        $announcements_num= Announcements::all()->count();
        $project_num= $this->project->getAllProjects()->count();
        $users_num= User::all()->count();
        $messages_num= Messages::all()->count();
        return view('AdminProject.message', compact('messages','announcements_num', 'project_num', 'users_num', 'messages_num'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return redirect()->route('homepage');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();


        $this->validate($request, [
            'phone_number' => 'required',
            'surname_name' => 'required',
            'gmail' => 'required',
            'first_name' => 'required',
            'message' => 'required',

        ]);

        $this->Messages->storeMessage($data);

        return redirect()->route('contactus')->with('success', 'Project Created Successfully!');

    }


    public function destroy($id)
    {
        $this->Messages->deleteMessages($id);

        return redirect()->route('admin.project.message')->with('success', 'messsage deleted Successfully!');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $searched_message =  Messages::where('first_name', 'like', "%$query%")->orwhere('surname_name', 'like', "%$query%")->orwhere('message', 'like', "%$query%")->get();
        $announcements_num= Announcements::all()->count();
        $project_num= $this->project->getAllProjects()->count();
        $users_num= User::all()->count();
        $messages_num= Messages::all()->count();

        return view('AdminProject.search.message_search', compact('searched_message', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }

}
