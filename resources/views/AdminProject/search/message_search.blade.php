@extends('layouts.admin_and_user_nav')

@section('content')
              <!-- ========================= main_section ==================== -->
        <div class="main_section">
            <div class="nav_button">
                <div class="toggle_button">
                    <ion-icon style="color: aliceblue;" name="menu-outline"></ion-icon>
                </div>

                <div class="search_bar" >
                    <form action="{{route('admin.message.search')}}" method="GET"  >
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
                    @if(count($searched_message) > 0 )
                    @forelse ($searched_message  as $message)
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{$message->first_name	}}  {{$message->surname_name	}} </h5>
                          <p class="card-title">{{$message->gmail}} <br> phone Number :  {{$message->phone_number}}</p>
                          <p class="card-text">{{$message->message }}</p>
                          <form action="{{route('admin.message.destroy', $message->id)}}" method="POST"  class="btn btn-primary  delete_form" >
                            @csrf
                            @method('DELETE')
                            <input type ="submit" value="Delete" />
                           </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @else
                    <p style="margin-left: 30px; color:white">no messages recived</p>
                    @endif

             </div>




@endsection
