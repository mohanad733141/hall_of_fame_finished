@extends('layouts.admin_and_user_nav')

@section('content')


  <div class="main_section">
    <div class="nav_button">
        <div class="toggle_button">
            <ion-icon style="color: aliceblue;" name="menu-outline"></ion-icon>
        </div>

        <div class="search_bar" >
            <form action="{{route('admin.project.search')}}" method="GET"  >
            <label style="margin-top: 30px">
                <input type="text" placeholder="Search here"  name="query">

                <button type = "submit"> <ion-icon name="search-outline" style="margin-top: 8px"></ion-icon></button>

            </label>
            </form>
        </div>

        <div class="user_image">
            <img src="img/customer01.jpg" alt="">
        </div>
    </div>

    <!-- ======================= Cards ================== -->
    @include('layouts.cards')


    <div  class ="user_table">
        <h1> searched result</h1>
        </div>

        <div class="create_project_container">
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
                    @if ($searched_project)
                    @foreach ($searched_project as $project)
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
                              Dropdown link
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
    </div>
    </div>
    @endsection


