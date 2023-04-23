@extends('layouts.admin_and_user_nav')

@section('content')
      <!-- ========================= main_section ==================== -->
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

            </div>
        </div>

        <!-- ======================= Cards ================== -->
        @include('layouts.cards')



    <div class = "modal_toggle">
        <h3>Announcements</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Announcement
          </button>
        </div>
        <div class="create_project_container">


            <!-- Modal -->
            <div class="modal fade create_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl ">
                  <div class="modal-content modal_container ">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.project.announcement.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
                            @csrf
                                <div class="form_announcement_name">
                                    <div class="project_title_form">
                                        <label for="announcements_title">announcements_title</label>
                                        <input class="form-control" maxlength="39" type="text" name="announcements_title" placeholder="announcements_title ">
                                    </div>

                                </div>



                                <div class="project_intoduction_form">
                                    <label for="project_intoduction">Announcements  Description</label>
                                    <textarea name="announcements_description" maxlength="360" placeholder="Add Announcements Descriptions..."></textarea>
                                </div>

                                <div>
                                    <input type="hidden" name="user_id" value="{{$user->id}}">

                                </div>





                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit" value="submit">Submit</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
            <!----->


            <div class="announcements_container">



                <div class="row">
                    @if(count($announcements) > 0 )
                    @forelse ($announcements  as $announcement)
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
                    <p style="margin-left: 20px; color:white">no annoucment made</p>
                    @endif

             </div>
             <div class = "announcements_paginate">
             <span>{{$announcements->links()}}</span>
            </div>




@endsection
