@extends('layouts.admin_and_user_nav')

@section('content')



  <!-- ========================= main_section ==================== -->
  <div class="main_section">
    <div class="nav_button">
        <div class="toggle_button">
            <ion-icon style="color: aliceblue;" name="menu-outline"></ion-icon>
        </div>

        <div class="search_bar">
            <label>
                <a href="{{route('admin.project.create')}}">
                <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </a>
            </label>
        </div>

        <div class="user_image">

        </div>
    </div>

    <!-- ======================= Cards ================== -->
    @include('layouts.cards')

<div class ="projects_container">

    <div class ="projects_table">
        <div class="table-responsive-md">
            <table class="table  table-hover table-borderless ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($projects)
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{$project->id}}</th>
                        <td><div class="img_container">
                            <img src="/users_project_image_uploaded/{{$project->project_thumbnail}}" alt="project image"/>
                        </div></td>
                        <td>{{$project->project_title}}</td>
                        <td>{{$project->student_name}}</td>
                        <td><div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              Actions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="{{route('admin.project.detail', $project->id)}}">Detail</a></li>
                              <li><a class="dropdown-item" href ="{{route('admin.project.edit', $project->id)}}"> edit</a></li>
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


    <div class ="new_users_table">
        <div class="table-responsive-md">
            <table class="table  table-hover table-borderless  ">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">gmail</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users)
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td> {{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
