<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\project_categories;
use App\Models\projects;
use App\Models\User;
use Illuminate\Support\Facades\Response;


use Illuminate\Support\Facades\Auth;


use App\Repository\adminProjectsRepository;
use App\Repository\announcement;
use App\Repository\category;
use GuzzleHttp\Psr7\Message;

class AdminProjectsController extends Controller
{

    public $admin;
    public $category;

    public function __construct(adminProjectsRepository  $admin, category $category)
    {
        $this->admin = $admin;
        $this->category = $category;
    }


    public function index()
    {
        $projects = $this->admin->getAllProjects()->take(4);
        $users = User::all()->take(4);
        $announcements_num = Announcements::all()->count();
        $project_num = $this->admin->getAllProjects()->count();
        $users_num = User::all()->count();
        $messages_num = Messages::all()->count();

        return view('AdminProject.index', compact('projects', 'users', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }


    public function create()
    {
        $categories = $this->category->getAllCategories();
        $projects = $this->admin->getPaginateProjects(5);
        $user = Auth::user();
        $announcements_num = Announcements::all()->count();
        $project_num = $this->admin->getAllProjects()->count();
        $users_num = User::all()->count();
        $messages_num = Messages::all()->count();
        //now that we got all the categories data we can send it with the view
        return view('AdminProject.create_project ', compact('categories', 'user', 'projects', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }


    public function store(Request $request)
    {

        //here is were we upload all info to database
        $request->validate([
            'project_title' => 'required',
            'project_intoduction' => 'required',
            'project_detail_description' => 'required',
            'project_thumbnail' => 'required',
            'project_img_1' => 'required',
            //nullable check if it works
            'project_video' => 'required|file|mimetypes:video/mp4',
            'category_id' => 'required',
            'student_name' => 'required',
            'student_course' => 'required',
            'student_gmail' => 'required',
            'user_id' => 'required',
            'student_image' => 'required',
            'project_img_2' => 'nullable',
            'project_img_3' => 'nullable',
            'user_indeed_link' => 'nullable',
            'project_pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->all();


        //upload images

        if ($file = $request->file('project_thumbnail')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('users_project_image_uploaded', $name);
            $data['project_thumbnail'] = "$name";
        }



        if ($file = $request->file('project_img_1')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['project_img_1'] = "$name";
        }



        if ($file = $request->file('project_img_2')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['project_img_2'] = "$name";
        } else {
            $data['project_img_2'] = null;
        }


        if ($file = $request->file('project_img_3')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['project_img_3'] = "$name";
        } else {
            $data['project_img_3'] = null;
        }

        //upload videos
        if ($request->hasFile('project_video')) {
            $path = $request->file('project_video')->store('users_uploaded_videos', ['disk' =>      'my_files']);
            $data['project_video'] = "$path";
        }



        if ($file = $request->file('project_pdf')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_pdf_uploaded', $name);

            $data['project_pdf'] = "$name";
        } else {
            $data['project_pdf'] = null;
        }


        if ($file = $request->file('student_image')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['student_image'] = "$name";
        }

        if ($request->has('user_indeed_link')) {
            $data['user_indeed_link'] = $request->input('user_indeed_link');
        } else {
            $data['user_indeed_link'] = null;
        }






        $this->admin->storeProject($data);


        return redirect()->route('admin.project.create')->with('success', 'Project Created Successfully!');
    }

    public function edit($id)
    {
        $user_project = $this->admin->editProject($id);
        $user_category = project_categories::all();
        $announcements_num = Announcements::all()->count();
        $project_num = $this->admin->getAllProjects()->count();
        $users_num = User::all()->count();
        $messages_num = Messages::all()->count();
        return view('AdminProject.edit_project', compact('user_project', 'user_category', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }

    public function downloadfile($id)
    {

        $filepath = $this->admin->downloadProject($id);
        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($filepath, 'student_project.pdf', $headers);
    }

    public function update($id, Request $request)
    {

        //here is were we upload all info to database

        $data = $request->all();

        $project = projects::find($id);

        //upload images
        if ($file = $request->file('project_thumbnail')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $project->project_thumbnail = $name;
        }


        if ($file = $request->file('project_img_1')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $project->project_img_1 = $name;
        }


        if ($file = $request->file('project_img_2')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $project->project_img_2 = $name;
        }


        if ($file = $request->file('project_img_3')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $project->project_img_3 = $name;
        }

        //upload videos
        if ($request->hasFile('project_video')) {
            $path = $request->file('project_video')->store('users_uploaded_videos', ['disk' =>      'my_files']);
            $project->project_video = $path;
        }



        if ($file = $request->file('project_pdf')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_pdf_uploaded', $name);

            $project->project_pdf = $name;
        }


        if ($file = $request->file('student_image')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $project->student_image = $name;
        }



        $project->save();
        $this->admin->updateProject($id, $data);

        return redirect()->route('admin.project.index')->with('update', 'Project Successfully Deleted!');
    }


    public function destroy($id)
    {
        $this->admin->deleteProject($id);
        return redirect()->route('admin.project.create')->with('delete', 'Project deleted Successfully!');
    }

    public function detail($id)
    {
        $project = $this->admin->detail($id);
        return view('DetailPage.detail', compact('project'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $searched_project =  projects::where('project_title', 'like', "%$query%")->get();
        $searched_user =  User::where('name', 'like', "%$query%")->get();
        $announcements_num = Announcements::all()->count();
        $project_num = $this->admin->getAllProjects()->count();
        $users_num = User::all()->count();
        $messages_num = Messages::all()->count();


        return view('AdminProject.search.create_project_search', compact('searched_project',  'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }

    public function allUsers()
    {
        $users = User::paginate(7);
        $announcements_num = Announcements::all()->count();
        $project_num = $this->admin->getAllProjects()->count();
        $users_num = User::all()->count();
        $messages_num = Messages::all()->count();

        return view('AdminProject.users', compact('users', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }

    public function MakeUserAdmin($id)
    {
        $user = User::find($id);
        $user->role = 1;
        $user->save();


        return redirect()->route('admin.users')->with('delete', 'Project deleted Successfully!');
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return redirect()->route('admin.users')->with('delete', 'Project deleted Successfully!');
    }

    public function searchUser(Request $request)
    {
        $query = $request->input('query');

        $searched_user =  User::where('name', 'like', "%$query%")->get();
        $announcements_num = Announcements::all()->count();
        $project_num = $this->admin->getAllProjects()->count();
        $users_num = User::all()->count();
        $messages_num = Messages::all()->count();

        return view('AdminProject.search.user_search', compact('searched_user', 'announcements_num', 'project_num', 'users_num', 'messages_num'));
    }
}
