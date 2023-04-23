@extends('layouts.admin_and_user_nav')

@section('content')
<div class="main_section">
    <div class="nav_button">
        <div class="toggle_button">
            <ion-icon style="color: aliceblue;" name="menu-outline"></ion-icon>
        </div>

        <div class="search_bar" >
            <form action="{{route('admin.project.announcement.search')}}" method="GET"  >
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



    <div class="announcements_container">



        <div class="row">
            @if(count($searched_project) > 0 )
            @forelse ($searched_project  as $announcement)
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$announcement->announcements_title}}</h5>
                  <p class="card-title">{{$announcement->created_at->diffForHumans()}}<p>
                  <p class="card-text">{{$announcement->announcements_description }}</p>
                  <form action="{{route('admin.project.announcement.destroy', $announcement->id)}}" method="POST"  class="btn btn-primary  delete_form" >
                    @csrf
                    @method('DELETE')
                    <input type ="submit" value="Delete" />
                   </form>
                  <a  href ="{{route('admin.project.announcement.edit', $announcement->id)}}" class="btn btn-primary">Edit</a>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <p style="margin-left: 30px; color:white">no annoucment made</p>
            @endif


    </div>





@endsection
