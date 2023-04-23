@extends('layouts.user_profile')

@section('content')

  <!-- ========================= main_section ==================== -->
  <div class="main_section">
    <div class="nav_button">
        <div class="toggle_button">
            <ion-icon style="color: aliceblue;" name="menu-outline"></ion-icon>
        </div>

        <div class="search_bar">

        </div>

        <div class="user_image">

        </div>
    </div>

    <!-- ======================= Cards ================== -->
    <div class="Card_container">
        <div class="Card_box">
            <div>
                <div class="numbers">{{$user_project_num}}</div>
                <div class="cardName">My Projects</div>
            </div>

            <div class="icon_box">
                <ion-icon name="people-outline"></ion-icon>
            </div>
        </div>

        <div class="Card_box">
            <div>
                <div class="numbers">{{$announcements_num}}</div>
                <div class="cardName">Announcments made</div>
            </div>

            <div class="icon_box">
                <ion-icon name="megaphone-outline"></ion-icon>
            </div>
        </div>

        <div class="Card_box">
            <div>
                <div class="numbers">{{$rewarded_project}} </div>
                <div class="cardName">my Award Project</div>
            </div>

            <div class="icon_box">
                <ion-icon name="ribbon-outline"></ion-icon>
            </div>
        </div>

        <div class="Card_box">
            <div>
                <div class="numbers">{{$project_num}}</div>
                <div class="cardName">All projects number</div>
            </div>

            <div class="icon_box">
                <ion-icon name="documents-outline"></ion-icon>
            </div>
        </div>
    </div>


    <h1 style="color: white; margin-left:40px;">Edit project form</h1>
     <div class="create_project_container">
    <form action="{{ route('user.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class ="form_container_1">

            <div class="project_title_form">
                <label for="project_title">Project Title</label>
                <input class="form-control" maxlength="20" type="text" name="project_title" value="{{ $project->project_title }}">
            </div>


            <div class="student_name_form">
                <label for="student_name">student name</label>
                <input  class="form-control" maxlength="12" type="text" name="student_name" value="{{ $project->student_name }}">
            </div>

        <div class="student_course_form">
            <label for="student_course">student course</label>
            <input class="form-control" maxlength="30" type="text" name="student_course" value="{{ $project->student_course }}">
        </div>

        <div class="student_gmail_form">
            <label for="student_gmail">student gmail</label>
            <input class="form-control" maxlength="27" type="text" name="student_gmail"  value="{{ $project->student_gmail }}">
        </div>


       </div>


        <div class ="form_container_2" >

            <div class="project_intoduction_form">
                <label for="project_intoduction">Project intoduction</label>
                <textarea  maxlength = "1500"name="project_intoduction"
                    >{{ $project->project_intoduction }}</textarea>
            </div>


            <div class="project_description_form">
                <label for="project_description">Project Detail Description</label>
                <textarea class="form-control" maxlength ="4200"name="project_detail_description" cols="30" rows="10"
                    placeholder="Add Project detail Description">{{ $project->project_detail_description }}</textarea>
            </div>

        </div>

        <div class= "images_container"  >
            <div class="edit_img_container">
                <h5>thumbnail</h5>
                <img src="/users_project_image_uploaded/{{$project->project_thumbnail}}" alt="project image"/>
            </div>
            <div class="edit_img_container">
                <h5>image_1</h5>
                <img src="/users_project_image_uploaded/{{ $project->project_img_1 }}" alt="project image"/>
            </div>
            <div class="edit_img_container">
                <h5>image_2</h5>
                <img src="/users_project_image_uploaded/{{ $project->Project_img_2  }}" alt="project image"/>
            </div>
            <div class="edit_img_container">
                <h5>image_3</h5>
                <img src="/users_project_image_uploaded/{{ $project->Project_img_3 }}" alt="project image"/>
            </div>
            <div class="edit_img_container">
                <h5>student image</h5>
                <img src="/users_project_image_uploaded/{{ $project->student_image }}" alt="project image"/>
            </div>

            <div class="edit_video_container">
                <h5>video</h5>
                <video  controls>
                <source src="/{{ $project->project_video }}" type="video/mp4">
                </video>
            </div>
        </div>


       <div class="form_container_3">

        <div class="project_thumbnail_form">
            <label for="Image">Upload Thumbnail image</label>
            <input  type="file" name="project_thumbnail">
        </div>


        <div class="project_video_form">
            <label for="Image">Upload video</label>
            <input  type="file" name="project_video">
        </div>


        <div class="project_img_1_form">
            <label for="Image">image-1 (optional)</label>
            <input  type="file" name="project_img_1">
        </div>

        <div class="project_img_2_form">
            <label for="Image">image-2 (optional)</label>
            <input  type="file" name="project_img_2">
        </div>

        <div class="project_img_3_form">
            <label for="Image">image-3 (optional)</label>
            <input  type="file" name="project_img_3">
        </div>


        <div class="project_pdf_form">
            <label for="pdf"> project pdf (optional)</label>
            <input  type="file" name="project_pdf">
        </div>


        <div class="student_image_form">
            <label for="student_image">student image</label>
            <input  type="file" name="student_image">
        </div>

    </div>

    <div class="form_container_4">

        <div class="user_indeed_link_form">
            <label for="user_indeed_link">Linkedin Link (optional)</label>
            <input class="form-control" type="text" name="user_indeed_link"  value="{{ $project->user_indeed_link }}">
        </div>


        <div class="category_id_form">
            <label for="category_id">Category</label>
            <select  name="category_id" id="category_id">
                 @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->project_category }}</option>
                 @endforeach
            </select>
        </div>







            <input type="hidden" name="user_id" value="{{ $project->user_id }}">

            <div class = "submit">
                <button type="submit" value="submit" class="btn btn-primary">Save changes</button>
             </div>





        </form>


</div>


 @endsection


