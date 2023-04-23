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
                <div class="cardName">your Awarded Project</div>
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





    @if (session('success'))
        <div class="alert alert-success" id="alert">{{ session('success') }}</div>
    @endif

    @if (session('delete'))
        <div class="alert alert-success" id="alert">{{ session('delete') }}</div>
    @endif

    <div class="modal_toggle">
        <h3>Create Project</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Project">
            Add project
        </button>
    </div>

    <div class="projects_container">

        <!-- Modal -->
        <div class="modal fade create_modal" id="create_Project" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl ">
                <div class="modal-content modal_container ">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">create project form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user.project.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form_container_1">

                                <div class="project_title_form">
                                    <label for="project_title">Project Title</label>
                                    <input class="form-control" maxlength="20" type="text" name="project_title"
                                        placeholder="project_title">
                                </div>


                                <div class="student_name_form">
                                    <label for="student_name">student name</label>
                                    <input class="form-control" maxlength="12" type="text" name="student_name"
                                        placeholder="student_name">
                                </div>

                                <div class="student_course_form">
                                    <label for="student_course">student course</label>
                                    <input class="form-control" maxlength="30" type="text" name="student_course"
                                        placeholder="student_course">
                                </div>

                                <div class="student_gmail_form">
                                    <label for="student_gmail">student gmail</label>
                                    <input class="form-control" maxlength="27" type="text" name="student_gmail"
                                        placeholder="student_gmail">
                                </div>


                            </div>

                            <div class="form_container_2">

                                <div class="project_intoduction_form">
                                    <label for="project_intoduction">Project intoduction</label>
                                    <textarea name="project_intoduction"  maxlength="1500"placeholder="Add Project Descriptions..."></textarea>
                                </div>


                                <div class="project_description_form">
                                    <label for="project_description">Project Detail Description</label>
                                    <textarea class="form-control" maxlength="4200" name="project_detail_description" cols="30" rows="10"
                                        placeholder="Add Project detail Description"></textarea>
                                </div>

                            </div>


                            <div class="form_container_3">

                                <div class="project_thumbnail_form">
                                    <label for="Image">Upload Thumbnail image</label>
                                    <input type="file" name="project_thumbnail">
                                </div>


                                <div class="project_video_form">
                                    <label for="Image">Upload video</label>
                                    <input type="file" name="project_video">
                                </div>


                                <div class="project_img_1_form">
                                    <label for="Image">image-1 </label>
                                    <input type="file" name="project_img_1">
                                </div>

                                <div class="project_img_2_form">
                                    <label for="Image">image-2 (optional) </label>
                                    <input type="file" name="project_img_2">
                                </div>

                                <div class="project_img_3_form">
                                    <label for="Image">image-3 (optional)</label>
                                    <input type="file" name="project_img_3">
                                </div>


                                <div class="project_pdf_form">
                                    <label for="pdf"> project pdf (optional)</label>
                                    <input type="file" name="project_pdf">
                                </div>


                                <div class="student_image_form">
                                    <label for="student_image">student image</label>
                                    <input type="file" name="student_image">
                                </div>

                            </div>

                            <div class="form_container_4">

                                <div class="user_indeed_link_form">
                                    <label for="user_indeed_link">Linkedin Link (optional)</label>
                                    <input class="form-control" type="text" name="user_indeed_link"
                                        placeholder="Project GiHub Title">
                                </div>


                                <div class="category_id_form">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->project_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                            <div class="modal-footer">
                                <button type="button" value="submit" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" value="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!----->

        <section class="project-section-user">

            @forelse ($user_project  as $project)
                <div class="project-container-user">
                    <a class ="project_detail_link"href="{{route('admin.project.detail', $project->id)}}" style =" height:100%" >
                    <img src="/users_project_image_uploaded/{{ $project->project_thumbnail }}" alt="project image"
                        class="project-image-user" />
                    </a>
                    <div class="project_deatils">
                        <div class="project-description-user">
                            <a class ="project_detail_link"href="{{route('admin.project.detail', $project->id)}}" style =" text-decoration: none;" >
                            <h1>
                                <strong>{{ $project->project_title }}</strong>
                            </h1>
                            <p>{{ $project->student_name }}</p>
                            </a>
                        </div>
                        <div class="buttons">
                            <a class="btn btn-light" href="{{ route('user.project.edit', $project->id) }}">Edit</a>
                            <form action="{{ route('user.project.destroy', $project->id) }}" method="POST" class="#">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-light" />
                            </form>
                        </div>
                    </div>
                </div>

            @empty
                <p style="color: white">No Projects Available</p>
            @endforelse





        </section>



    </div>
@endsection
