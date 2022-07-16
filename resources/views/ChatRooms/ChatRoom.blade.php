<!doctype html>
<html>
<head>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link  href="{{asset("css/ChatRoom/chatRoomStyle.css")}}" type="text/css" rel="stylesheet"/>

{{--room assests--}}
    <link rel='stylesheet' type='text/css' media='screen' href='{{mix("css/ChatRoom/main.css")}}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{mix("css/ChatRoom/room.css")}}'>
{{--end room assests--}}

{{--    drawing assets--}}

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" defer>--}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">--}}
    <link rel="stylesheet" href="{{asset("css/ChatRoom/Drawing/style.css")}}">
</head>

{{--<body id="snippet-body">--}}
<body id="body-pd">
{{--<div i>--}}
    <div id="chatRoomPage" style="padding: 0px">

        <input type="hidden" id="name" value="{{$name}}">
        <input type="hidden" id="roomID" value="{{$roomID}}">

    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav ">
            <div>

                <a href="#"  class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">BBBootstrap</span>
                </a>

                <div class="nav_list " role="tablist">

                    <a  @click="showVideo" id="video_btn" href="#" class="nav_link ">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Chat Room</span>
                    </a>

                    <a  @click="showIDE"  id="" href="#" class="nav_link" >
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">IDE</span>
                    </a>

                    <a @click="showDrawingPane" href="#" class="nav_link">
                        <i class='bx bx-message-square-detail nav_icon'>
                        </i> <span class="nav_name">Drawing Pane</span>
                    </a>

                    <a href="#" class="nav_link">
                        <i class='bx bx-bookmark nav_icon'>
                        </i> <span class="nav_name">Editor</span>
                    </a>

                    <a href="#" class="nav_link" > <i class='bx bx-folder nav_icon'>
                        </i> <span class="nav_name">Files</span>
                    </a>

                    <a href="#" class="nav_link">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Stats</span>
                    </a>
                </div>
            </div>

            <a href="#" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>room

        </nav>
    </div>

        <div  id="roomVideoPage" style="width: 100%; padding: 0px; display:block;"  id="chatBlock">
            @include("ChatRooms.Room")
        </div>

        <div  id="chePage" style="width:95%; margin-left:5%; margin-top: 100px; padding-bottom:56.25%; display:none;  position:relative;">
            <iframe src="https://che-eclipse-che.yousefkhrais.site" style="position:absolute; top:0px; left:0px;
                         width:100%; height:100%; border: none; overflow: hidden;"></iframe>
        </div>

        <div  id="drawingPage" style="width:95%; margin-left:3%; margin-top: 100px;
        display:none;  position:relative; ">
            @include("ChatRooms.Drawing")
        </div>
    </div>

</body>

<script src="{{asset("js/ChatRoom/manager.js")}}"></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src="{{asset("/js/ChatRoom/main.js")}}"></script>

<script type="text/javascript" src="{{mix('js/ChatRoom/room.js')}}"></script>

<script type="module" src="{{mix('js/ChatRoom/room_rtc.js')}}">

</script>


{{--drawing scripts--}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src=" https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/agora-rtm-sdk@1.3.1/index.js"></script>
<script src="{{asset("js/ChatRoom/Drawing/main.js")}}"></script>

</html>
