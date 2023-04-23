@extends('layouts.nav-footer')

@section('content')

        <!-- Banner -->
        <section class="welcome_section " id="welcome_page">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-xl-7 wow fadeIn" data-wow-duration="1.5s">
                        <span class="website_name_box">THE HALL OF FAME</span>
                        <h1>Discover and explore  <span class="text_rotation " text_duration="1000" text_variation_rotation='[ "creative", "unique", "orginal" ]'></span> Projects in the hall of fame.</h1>
                        <p>Welcome to the Hall of Fame website, the ultimate destination for celebrating the achievements of outstanding students who have created unique and creative projects. Our website showcases the accomplishments of inspiring students from diverse backgrounds, including technology, art, literature, science, and more.</p>
                        <button onclick="location.href='{{ route('login') }}';">Login<i class="bi bi-arrow-right-circle"></i></button>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5 wow zoomIn" data-wow-duration="1.5s">
                        <img src="img/header-img.svg" alt="floating_image">
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner End -->

        <!-- Skills -->
        <section class="website_statistics" id="website_statistics">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="website_statistics-box wow zoomIn" data-wow-duration="1.5s">
                            <h2>Statistics</h2>
                            <p>What you waiting for! join us and display your best <br>project for a chance to be awarded by our team and to be displayed in the Hall of fame special category.</p>
                            <div class="owl-carousel owl-theme website_statistics-slider">
                                <div class="item">
                                    <h1>{{$announcements_num}}</h1>
                                    <h5>Announcments Made</h5>
                                </div>
                                <div class="item">
                                    <h1>{{$project_num}}</h1>
                                    <h5>Users</h5>
                                </div>
                                <div class="item">
                                    <h1>{{$users_num}}</h1>
                                    <h5>Project Number</h5>
                                </div>
                                <div class="item">
                                    <h1>{{$project_num}}</h1>
                                    <h5>Users</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="sdf" src="img/color-sharp.png" alt="Image">
        </section>
        <!-- Skills End -->

        <!-- Projects -->
        <section class="project" id="project">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeIn" data-wow-duration="1.5s">
                        <h2>Projects</h2>
                        <p>View the most recently added projects, and he most recently awarded projects by our team. check out the latest announcements and keep an eye on events. All will be announced here in the announcement section.</p>

                        <ul class="nav nav-pills mb-5 justify-content-center align-items-center id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="new-projects-tab" data-bs-toggle="pill" data-bs-target="#new-projects" type="button" role="tab" aria-controls="new-projects" aria-selected="true">Recently added projects</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="liked-projects-tab" data-bs-toggle="pill" data-bs-target="#liked-projects" type="button" role="tab" aria-controls="liked-projects" aria-selected="false">Hall Of Fame Projects</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="announcements-tab" data-bs-toggle="pill" data-bs-target="#announcements" type="button" role="tab" aria-controls="announcements" aria-selected="false">Anouncments</button>
                            </li>
                        </ul>
                          <!-- new-Projects-tab-->
                        <div class="tab-content" id="pills-tabContent wow slideInUp" data-wow-duration="1.5s">
                            <div class="tab-pane fade show active" id="new-projects" role="tabpanel" aria-labelledby="new-projects-tab">
                                <div class="row">
                                    @if(count($projects)> 0)
                                    @foreach ($projects as $project )
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="project-image">
                                            <a class ="project_detail_link"href="{{route('admin.project.detail', $project->id)}}" >
                                            <img src="/users_project_image_uploaded/{{$project->project_thumbnail}}"  alt="project-image">
                                            </a>
                                            <a class ="project_detail_link" style= "color:white"href="{{route('admin.project.detail', $project->id)}}" >
                                            <div class="project-description">
                                                <a class ="project_detail_link" style= "color:white"href="{{route('admin.project.detail', $project->id)}}" >
                                                <h4>{{$project->project_title}}</h4>
                                                <span>{{$project->student_name}}</span>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @endif
                                </div>
                            </div>
                              <!--most-liked-Projects -->
                            <div class="tab-pane fade" id="liked-projects" role="tabpanel" aria-labelledby="liked-projects-tab">
                                <div class="row">
                                    @if(count($HallOfFameProjects)> 0)
                                    @foreach($HallOfFameProjects as $project )
                                    <div class="col-12 col-sm-6 col-md-4">
                                        <div class="project-image">
                                            <a class ="project_detail_link" style= "color:white"href="{{route('admin.project.detail', $project->id)}}" >
                                            <img src="/users_project_image_uploaded/{{$project->project_thumbnail}}"  alt="project-image">
                                            </a>
                                            <div class="project-description">
                                                <a class ="project_detail_link" style= "color:white"href="{{route('admin.project.detail', $project->id)}}" >
                                                <h4>{{$project->project_title}}</h4>
                                                <span>{{$project->student_name}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @endif

                            </div>
                            </div>
                             <!--Announcements -->
                            <div class="tab-pane fade" id="announcements" role="tabpanel" aria-labelledby="announcements-tab">
                                @if(count($announcements)> 0)
                                @foreach ($announcements as $announcement )
                                <p style="text-align: start ; color:white; font-size:25px" > {{$announcement->announcements_title}} </p>
                                <p style="text-align: start"> {{$announcement->announcements_description}}</p>
                                <br>
                                @endforeach
                                @else
                                <p> No Announcement made</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="sdf2" src="img/color-sharp2.png" alt="Image">
        </section>
        <!-- Projects End -->

@endsection
