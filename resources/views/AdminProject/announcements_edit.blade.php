@extends('layouts.admin_and_user_nav')

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
    @include('layouts.cards')



<h1 style="color: white; margin-left:40px;">Edit announcement form</h1>

<div class="create_project_container">
    <form action="{{ route('admin.project.announcement.update', $announcement->id) }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
            <div class="form_announcement_name">
                <div class="project_title_form">
                    <label for="announcements_title">announcements_title</label>
                    <input class="form-control" maxlength="39" type="text" name="announcements_title" value="{{$announcement->announcements_title}}">
                </div>

            </div>



            <div class="project_intoduction_form">
                <label for="project_intoduction">Announcements  Description</label>
                <textarea name="announcements_description">{{$announcement->announcements_description}}</textarea>
            </div>

            <div>
                <input type="hidden" name="user_id" value="{{$user->id}}">

            </div>

            <div class="submit_announcement">
                <button class="btn btn-primary" type="submit" value="submit">Save changes</button>
            </div>




        </form>
          </div>

@endsection
