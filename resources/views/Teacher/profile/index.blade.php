@extends("layouts.Home")
@section("studentProfile")

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teacher Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{$teacher->image_link}}"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{$teacher->getFullName()}}</h5>
                            <p class="text-muted mb-1">Student</p>
                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a class="btn btn-primary" href="{{route("teacher.profile.edit")}}">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">My Accounts</p>
                                    <p class="mb-0"></p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <i class="bi bi-linkedin"></i>
                                        <h6 class="text-center m-3">Linkedin:</h6>
                                    </div> @if(!empty($teacher->linkedin))

                                        <a class="mb-0" href="{{$teacher->linkedin}}">Linkedin</a>
                                    @endif
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <i class="bi bi-github"></i>
                                        <h6 class="text-center m-3">Github:</h6>
                                    </div>
                                    @if(!empty($teacher->github))
                                        <a class="mb-0" href="{{$teacher->github}}">Github</a>
                                    @endif
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <div class="d-flex justify-content-between align-items-center ">
                                        <i class="bi bi-stack-overflow"></i>
                                        <h6 class="text-center m-3">Stack Overflow:</h6>
                                    </div>
                                    @if(!empty($teacher->stack_overflow))
                                        <a class="mb-0" href="{{$teacher->stack_overflow}}">Stack Overflow</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <h6 class="mb-4 text-primary">Personal Details</h6>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->getFullName()}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->email}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone Number</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->phone_number}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->getGender()}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">About Me</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->description}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date Of Birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->date_of_birth}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->address}}</p>
                                </div>
                            </div>
                            <hr>
                            </br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <h6 class="mb-4 text-primary">More Details</h6>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Courses Count</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->getCoursesCount()}} Courses</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Join Date</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$teacher->created_at}}</p>
                                </div>
                            </div>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
