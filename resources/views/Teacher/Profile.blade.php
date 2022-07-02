
@extends("layouts.Home")

@section("teacherProfile")

    <div class="container pt-4 mb-4" id="profile">

        <input  id="teacher_id" type="hidden" value="{{$teacher_id}}"/>

        <div class="row">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb py-3 px-3">
                        <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-5">
                <div class="row">
                    <div class="col-12 bg-white p-0 px-3 py-3 mb-3">
                        <div class="d-flex flex-column align-items-center">
                            <img class="photo"
                                 :src="teacher.image_link"
                                 alt="">
                            <p class="fw-bold h4 mt-3" >@{{teacher.first_name}} @{{teacher.last_name}}</p>
                            <p class="text-muted">@{{teacher.description}}</p>
                            <div class="d-flex ">
                                <a href="{{route("editTeacherProfile")}}" class="btn btn-primary follow me-2">
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 bg-white p-0 px-2 pb-3 mb-3">

                        <div  v-for="(k,v) in socialMedia" class="d-flex justify-content-between border-bottom py-2 px-3">
                            <p><span class="fas fa-globe me-2">@{{ k }}</span></p>
                            <a class ="btn btn-link btn-sm" :href=" v ">Visit</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-7 ps-md-4">
                <div class="row">
                    <div class="col-12 bg-white px-3 mb-3 pb-3">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Full Name</p>
                            <p class="py-2 text-muted">@{{teacher.first_name}} @{{teacher.last_name}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Email</p>
                            <p class="py-2 text-muted">@{{teacher.email}}</p>
                        </div>

                        <div v-if="teacher.phone_number" class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="py-2">Phone</p>
                            <p class="py-2 text-muted">@{{teacher.phone_number}}</p>
                        </div>

                        <div v-if="teacher.address" class="d-flex align-items-center justify-content-between">
                            <p class="py-2">Address</p>
                            <p class="py-2 text-muted"> @{{ teacher.address }}</p>
                        </div>

                    </div>

                    <div class="col-12 bg-white px-3 pb-2">
                        <h6 class="d-flex align-items-center mb-3 fw-bold py-3"><i
                                class="text-info me-2">Courses </i>Progression
                            Status</h6>
                        <small>Web Design</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 60%"
                                 aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>One Page</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                 aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Mobile Template</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                 aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Backend API</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 90%"
                                 aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Website Markup</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                 aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")

    <script src="{{asset("js/Teacher/TeacherProfile.js")}}">

    </script>

    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });

    </script>

@endsection

@section("style")
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset("css/Student/profile.css")}}">
@endsection



