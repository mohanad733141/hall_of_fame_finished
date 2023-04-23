@extends('layouts.nav-footer-hall-of-fame')

@section('contents')
    <section class="project" id="project">
        <div class="container">
            <div class="col-12 wow fadeIn" data-wow-duration="1.5s">
                <h2>Projects</h2>
                <p class="welcome_text">Here you can see all projects uploaded by users these also include the award winning projects. You can search name or by category and enjoy the various creative projects uploaded by many students from different courses and backgrounds .  </p>


                <div class="search-section">
                    <div class="search">
                        <form action="{{ route('others.search') }}" method="GET" class="search_form">
                            <button class="search-button">search</button>
                            <input type="text" placeholder=" Search projects" name="query" />

                            <select name="project_catagory" id="#">
                                @foreach ($project_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->project_category }}</option>
                                @endforeach
                            </select>

                        </form>

                    </div>
                </div>

                <section class="project-section-user">


                    @if ($searched_project)
                        @foreach ($searched_project as $project)
                            <div class="project-container-user">
                                <a class="project_detail_link" href="{{ route('admin.project.detail', $project->id) }}">
                                    <img src="/users_project_image_uploaded/{{ $project->project_thumbnail }}"
                                        alt="project image" class="project-image-user" />
                                </a>
                                <div class="project_deatils">
                                    <div class="project-description-user">
                                        <a class="project_detail_link"
                                            href="{{ route('admin.project.detail', $project->id) }}">
                                            <h1>
                                                <strong>{{ $project->project_title }}</strong>
                                            </h1>
                                            <p>{{ $project->student_name }}</p>
                                        </a>
                                    </div>
                                    <div class="award-label-container">
                                        @if ($project->project_category == '1')
                                            <div class="award-label">
                                                <p>AWARD-WINNER</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>no project found</p>
                    @endif










                </section>




            @endsection
