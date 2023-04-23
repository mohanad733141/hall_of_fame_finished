@extends('layouts.detail_page_nav')

@section('contents')

        <section class = "nav_background">
        </section>

        <section class = "users_project_image">
        <img src="/users_project_image_uploaded/{{ $project->project_thumbnail }}" alt = "user project image" id ="project_user_image" class = "project_user_image"/>
        </section>


        <div class = "users_project_details">
            <div class = "project_detail">
                <h1 class="reveal">{{ $project->project_title }}</h1>
                <p class="reveal">{{ $project->project_intoduction }}</p>
            </div>
            <div class = "user_contact_info">
                <div class = "user_image">
                    <img src="/users_project_image_uploaded/{{ $project->student_image }}">
                </div>
                <div class = "user_contacts">
                    <h1>Student Name:</h1>
                     <p >{{ $project->student_name }}</p>
                    <h1 >Student Gmail:</h1>
                    <p >{{ $project->student_gmail }}</p>
                    <h1 >Student Course:</h1>
                    <p >{{ $project->student_course }}</p>

                </div>
            </div>
        </div>


        <section class = "user_video_container">
            <div class="video">
               <video  autoplay controls  src="/{{ $project->project_video }}"  height="100%" width="100%" type="video/mp4"></video>
            </div>
        </section>



        <section class = "preject-description">
            <h1 class="reveal">{{ $project->project_title }}</h1>
            <p class="reveal">{{ $project->project_detail_description }}</p>


        </section>

        @if($project->project_category == '1')
        <section class = "award_section">
            <div class = "reward_description" >
                <h2> This project have been is awarded</h2>
                <p> We are thrilled to announce that this project has been awarded the top prize in its category!  This recognition is a testament to the hard work, dedication, and creativity of the student. </p>
            </div>
            <div  class = "reward_image" >
                <img src ="/img/reward.png"/>
            </div>

        </section>
        @endif





        <section class = "preject_image_container reveal">
            <div class = "fade-in-image">
                 <img src="/users_project_image_uploaded/{{ $project->project_img_1 }}" alt ="image"/>
            </div>
         </section>


         @if(is_null($project->Project_img_2))
         @else
        <section class = "preject_image_container reveal">
            <div class = "fade-in-image ">
                <img src="/users_project_image_uploaded/{{ $project->Project_img_2 }}" alt ="image"/>
            </div>
         </section>
         @endif


         @if(is_null($project->Project_img_3))
         @else
        <section class = "preject_image_container reveal">
           <div class = "fade-in-image " id ="image">
            <img src="/users_project_image_uploaded/{{ $project->Project_img_3 }}" alt ="image" id ="image" />
           </div>
        </section>
        @endif




            <div class = "pdf_section">
            <div class ="pdf_container_1">
            <h1 class="reveal">Addtional information</h1>
            <p class="reveal"> For more information, you can click on the indeed logo to contact student, or you can click on the pdf link to see the project in more details.</p>

            @if(is_null($project->project_pdf))
            @else
            <a class = "pdf_link reveal" href="/project/downloadfile/{{ $project->id }}" download>Download pdf Link</a>
            @endif
            </div>

            <div class ="pdf_container_2">

            @if(is_null($project->user_indeed_link))
            @else
            <a class = "reveal" href="{{ $project->user_indeed_link}}" alt="link broken" target="_blank" title="student indeed account"> <img class = "indeed_logo"src="/img/indeed_logo.png" alt="image indeed">
            </a>
            @endif

            </div>
            </div>

@endsection
