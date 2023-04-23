@extends('layouts.admin_and_user_nav')

@section('content')

  <!-- ========================= main_section ==================== -->
  <div class="main_section">
    <div class="nav_button">
        <div class="toggle_button">
            <ion-icon style="color: aliceblue;" name="menu-outline"></ion-icon>
        </div>

        <div class="search_bar" >
            <form action="{{route('admin.user.search')}}" method="GET"  >
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
   <h1> Users Table</h1>
   </div>
   <div class="create_project_container">

    <div class = "admin_projects_table">
        <div class="table-responsive-md">
            <table class="table  table-hover table-borderless ">
                <thead >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">gmail</th>
                        <th scope="col">Create At </th>
                        <th scope="col">Action </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($searched_user)
                    @foreach ($searched_user as $user)
                        @if ($user->role ===  1)
                        @else
                    <tr>
                        <th scope="row">{{$user->id }}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}} </td>
                        <td><div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('admin.addAdmin', $user->id)}}">Make user admin</a></li>
                                <li><form action="{{route('admin.user.destroy', $user->id)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type ="submit" value="Delete"  class="dropdown-item"/>
                                   </form></li>
                              </ul>
                          </div></td>
                    </tr>
                    @endif

                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    </div>
    </div>
    @endsection


