

 <!-- ======================= Cards ================== -->

 <div class="Card_container">
    <div class="Card_box">
        <div>
            <div class="numbers">{{$users_num}}</div>
            <div class="cardName">Users</div>
        </div>

        <div class="icon_box">
            <ion-icon name="people-outline"></ion-icon>
        </div>
    </div>

    <div class="Card_box">
        <div>
            <div class="numbers">{{$announcements_num}}</div>
            <div class="cardName">Announcements</div>
        </div>

        <div class="icon_box">
            <ion-icon name="megaphone-outline"></ion-icon>
        </div>
    </div>

    <div class="Card_box">
        <div>
            <div class="numbers">{{$messages_num}}</div>
            <div class="cardName">Messages</div>
        </div>

        <div class="icon_box">
            <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
    </div>

    <div class="Card_box">
        <div>
            <div class="numbers">{{$project_num}}</div>
            <div class="cardName">Projects</div>
        </div>

        <div class="icon_box">
            <ion-icon name="documents-outline"></ion-icon>
        </div>
    </div>
</div>

@yield('cards')
