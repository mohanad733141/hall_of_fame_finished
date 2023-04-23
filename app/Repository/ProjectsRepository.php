<?php

namespace App\Repository;

use App\Models\Projects;
use App\Models\project_categories;

use App\interfaces\ProjectInterface;

class  ProjectsRepository implements ProjectInterface{


    public function getPaginateProjects($paginateNum){

        return Projects::paginate($paginateNum);
    }


    public function getAllProjects(){

        return Projects::All();
    }



    public function detail($id){

        return projects::find($id);
    }


    public function downloadProject($id){
        $project = projects::find($id);
        $pdf = $project->project_pdf;
        $filepath = public_path() . "/users_project_pdf_uploaded" . "/$pdf";


        return  $filepath;

    }

    public function deleteProject($ProjectId){

        $project = projects::find($ProjectId);

        if(is_null($project->project_pdf)){

        }else{
            @unlink(public_path($project->project_pdf));
        }

        if(is_null($project->Project_img_2)){

        }else{
            @unlink(public_path($project->Project_img_2));
        }

        if(is_null($project->Project_img_3)){

        }else{
            @unlink(public_path($project->Project_img_3));
        }




        @unlink(public_path($project->project_thumbnail));
        @unlink(public_path($project->project_video));

        @unlink(public_path($project->student_image));
        @unlink(public_path($project->project_img_1));

        @unlink(public_path($project->student_image));
        $project->delete();


    }


    public function storeProject(array $data){

         projects::create([
            'project_title' => $data['project_title'],
            'project_intoduction' =>$data['project_intoduction'],
            'project_detail_description' => $data['project_detail_description'],
            'project_thumbnail' => $data['project_thumbnail'],
            'project_img_1' => $data['project_img_1'],
            //nullable check if it works
            'project_img_2' => $data['project_img_2'],
            'project_img_3' => $data['project_img_3'],
            'project_video' => $data['project_video'],
            'user_indeed_link' =>  $data['user_indeed_link'],
            'project_category' =>  $data['category_id'],
            'project_pdf' =>  $data['project_pdf'],
            'student_name' =>  $data['student_name'],
            'student_course' =>  $data['student_course'],
            'student_gmail' =>  $data['student_gmail'],
            'user_id' =>  $data['user_id'],
            'student_image' => $data['student_image'],
        ]);
    }



    public function updateProject( $id, array $data){



        projects::find($id)->update([
            'project_title' => $data['project_title'],
            'project_intoduction' =>$data['project_intoduction'],
            'project_detail_description' => $data['project_detail_description'],
            'user_indeed_link' =>  $data['user_indeed_link'],
            'project_category' =>  $data['category_id'],
            'student_name' =>  $data['student_name'],
            'student_course' =>  $data['student_course'],
            'student_gmail' =>  $data['student_gmail'],
            'user_id' =>  $data['user_id'],
        ]);

    }

    public function editProject($id){

        return projects::find($id);
    }








}



?>
