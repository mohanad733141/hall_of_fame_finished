<?php

namespace App\Http\Controllers;

//
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\projects;
use App\Models\project_categories;
use Illuminate\Support\Facades\Response;
use App\Repository\userProjectsRepository;
use App\Repository\category;
use App\Models\Announcements;


class UserProjectController extends Controller
{
    public $user;
    public $category;
    public function __construct( userProjectsRepository $user,category $category )
    {
        $this->user = $user;
        $this->category = $category;
    }

    public function index()
    {


        $user = Auth::user();
        $categories = $this->category->getAllCategories()->where('id', '>', '1');
        $user_project = $this->user->getAllProjects();
        $user_project_num = $this->user->getAllProjects()->count();
        $announcements_num = Announcements::all()->count();
        $user_id =  Auth::user()->id;
        $project_num = projects::All()->count();
        $rewarded_project = projects::where('user_id', $user_id)->where('project_category', '=', '1')->count();

        return view('UsersProject.index', compact('user_project','user', 'categories', 'user_project_num', 'rewarded_project', 'project_num', 'announcements_num'));

    }


    public function store(Request $request)
    {

            //here is were we upload all info to database
        $request->validate( [
            'project_title' => 'required',
            'project_intoduction' => 'required',
            'project_detail_description' => 'required',
            'project_thumbnail' => 'required',
            'project_img_1' => 'required',
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
            $data['project_thumbnail'] ="$name";
        }



        if ($file = $request->file('project_img_1')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['project_img_1'] ="$name";
        }



        if ($file = $request->file('project_img_2')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['project_img_2'] ="$name";
        }
        else{
            $data['project_img_2'] = null;
        }


        if ($file = $request->file('project_img_3')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['project_img_3'] ="$name";
        }
        else{
            $data['project_img_3'] = null;
        }

        //upload videos
        if ($request->hasFile('project_video')) {
            $path = $request->file('project_video')->store('users_uploaded_videos', ['disk' =>      'my_files']);
            $data['project_video'] ="$path";
        }



        if ($file = $request->file('project_pdf')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_pdf_uploaded', $name);

            $data['project_pdf'] ="$name";
        }
        else{
            $data['project_pdf'] = null;
        }


        if ($file = $request->file('student_image')) {
            $name = time() . $file->getClientOriginalName();


            $file->move('users_project_image_uploaded', $name);

            $data['student_image'] ="$name";
        }

        if ($request->has('user_indeed_link')) {
            $data['user_indeed_link'] = $request->input('user_indeed_link');
        }else{
            $data['user_indeed_link'] = null;
        }




        $this->user->storeProject($data);


        return redirect()->route('user.project.index')->with('success', 'Project Created Successfully!');
    }


    public function edit($id)
    {
        $project =  $this->user->editProject($id);
        $categories = $this->category->getAllCategories()->where('id', '>', '1');
        $user_project_num = $this->user->getAllProjects()->count();
        $user_id =  Auth::user()->id;
        $project_num = projects::All()->count();
        $announcements_num = Announcements::all()->count();
        $rewarded_project = projects::where('user_id', $user_id)->where('project_category', '=', '1')->count();

        return view('UsersProject.edit', compact('project', 'categories', 'user_project_num', 'rewarded_project', 'project_num', 'announcements_num'));
    }

    public function downloadfile($id)
    {

        $filepath = $this->user->downloadProject($id);
        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($filepath, 'student_project.pdf', $headers);
    }


    public function update(Request $request, $id)
    {
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
       $this->user->updateProject($id, $data);


        return redirect()->route('user.project.index')->with('success', 'Project updated Successfully!');

    }

    public function destroy($id)
    {
        $this->user->deleteProject($id);
        return redirect()->route('user.project.index')->with('success', 'Project deleted Successfully!');
    }
}
