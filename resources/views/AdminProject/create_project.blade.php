@extends('layouts.admin_and_user_nav')

@section('content')
  <!-- ========================= main_section ==================== -->
  <div class="main_section">
    <div class="nav_button">
        <div class="toggle_button">
            <ion-icon style="color: aliceblue;" name="menu-outline"></ion-icon>
        </div>

        <div class="search_bar">
            <label style="margin-top: 30px">
                <form action="{{route('admin.project.search')}}" method="GET" >
                <input type="text" placeholder="Search here" name ="query">

                    <button type="submit" ><ion-icon name="search-outline" style="margin-top: 8px"></ion-icon></button>

            </form>
            </label>
        </div>

        <div class="user_image">

        </div>
    </div>

    <!-- ======================= Cards ================== -->
    @include('layouts.cards')





<div class = "modal_toggle">
    <h3>Create Project</h3>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Project">
        Create Project
      </button>
    </div>
    <div class="create_project_container">

        @if(session('success'))
            <div class = "alert alert-success" id = "alert">{{session('success')}}</div>
        @endif

        @if(session('delete'))
        <div class = "alert alert-success" id = "alert">{{session('delete')}}</div>
        @endif

        <!-- Modal -->
        <div class="modal fade create_modal" id="create_Project" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl ">
              <div class="modal-content modal_container ">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class ="form_container_1">

                            <div class="project_title_form">
                                <label for="project_title">Project Title</label>
                                <input class="form-control" maxlength="20" type="text" name="project_title" placeholder="project_title">
                            </div>


                            <div class="student_name_form">
                                <label for="student_name">student name</label>
                                <input  class="form-control" maxlength="12" type="text" name="student_name" placeholder="student_name">
                            </div>

                        <div class="student_course_form">
                            <label for="student_course">student course</label>
                            <input class="form-control" maxlength="30" type="text" name="student_course" placeholder="student_course">
                        </div>

                        <div class="student_gmail_form">
                            <label for="student_gmail">student gmail</label>
                            <input class="form-control" maxlength="27" type="text" name="student_gmail" placeholder="student_gmail">
                        </div>


                       </div>

                        <div class ="form_container_2" >

                            <div class="project_intoduction_form">
                                <label for="project_intoduction">Project intoduction</label>
                                <textarea  name="project_intoduction"
                                    placeholder="Add Project Descriptions..." maxlength="1500"></textarea>
                            </div>


                            <div class="project_description_form">
                                <label for="project_description">Project Detail Description</label>
                                <textarea class="form-control" name="project_detail_description" cols="30" rows="10"
                                    placeholder="Add Project detail Description" maxlength="4200"></textarea>
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
                            <input class="form-control" type="text" name="user_indeed_link" placeholder="Project GiHub Title">
                        </div>


                        <div class="category_id_form">
                            <label for="category_id">Category</label>
                            <select  name="category_id" id="category_id">
                                 @foreach ($categories as $category)
                                 <option value="{{ $category->id }}">{{ $category->project_category }}</option>
                                 @endforeach
                            </select>
                        </div>



                     </div>




                            <input type="hidden" name="user_id" value="{{ $user->id }}">










                        <div class="modal-footer">
                            <button type="button" value="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" value="submit" class="btn btn-primary">Submit</button>

                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        <!----->
    <div class = "admin_projects_table">
        <div class="table-responsive-md">
            <table class="table  table-hover table-borderless ">
                <thead >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Student Course </th>
                        <th scope="col">Student Gmail </th>
                        <th scope="col">Create At </th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($projects)
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{$project->id }}</th>
                        <td><div class="img_container">
                            <img src="/users_project_image_uploaded/{{$project->project_thumbnail}}" alt="project image"/>
                        </div></td>
                        <td>{{$project->project_title}}</td>
                        <td>{{$project->student_name}}</td>
                        <td>{{$project->student_course}}</td>
                        <td>{{$project->student_gmail}}</td>
                        <td>{{$project->created_at->diffForHumans()}} </td>
                        <td><div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              Actions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="{{route('admin.project.detail', $project->id)}}">Detail</a></li>
                              <li><a class="dropdown-item" href ="{{route('admin.project.edit', $project->id)}}" > edit</a></li>
                                <li><form action="{{route('admin.project.destroy', $project->id)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type ="submit" value="Delete"  class="dropdown-item"/>
                                   </form></li>
                            </ul>
                          </div></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class ="pagination">
    <span>{{$projects->links()}}</span>
    </div>
    </div>
    </div>
    @endsection


