<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/css/admin_announcements.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <!-- =============== navigation_bar ================ -->
    <div class="container_admin">
        <div class="navigation_bar">
            <ul>

                   <li>
                    <a href="#">
                        <span class="icon_img">
                            <ion-icon name="layers-outline"></ion-icon>
                        </span>
                        <span class="nav_title">User Profile</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('user.project.index')}}">
                        <span class="icon_img">
                            <ion-icon name="megaphone-outline"></ion-icon>
                        </span>
                        <span class="nav_title">Projects</span>
                    </a>
                </li>


                <li>
                    <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <span class="icon_img">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="nav_title">Sign Out</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>



            @yield('content')

            <!-- =========== Scripts =========  -->

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="/js/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>

            <script src="/js/admin.js"></script>
</body>

</html>
