@extends("layouts.Home")
@section("studentProfile")

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
                    @endif
                @endforeach
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{route("teacher.profile.index")}}">Teacher Profile</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <p class="text-muted mb-1">Teacher</p>
                            <p class="text-muted mb-4">{{$teacher->address}}</p>
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
                                    </div>
                                    @if(!empty($teacher->linkedin))
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

                    <div class="card">
                        <form method="post" action="{{ Route("teacher.profile.update") }}">
                            @csrf
                            <div class="card-body">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <h6 class="mb-4 text-primary">Personal Details</h6>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="first_name"
                                               value="{{$teacher->first_name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="last_name"
                                               value="{{$teacher->last_name}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email"
                                               value="{{$teacher->email}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone Number</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phone_number"
                                               value="{{$teacher->phone_number}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-control" name="gender">
                                            @if ($teacher->gender)
                                                <option value="0">Male</option>
                                                <option value="1" selected>Female</option>
                                            @else
                                                <option value="0" selected>Male</option>
                                                <option value="1">Female</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date Of Birth</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" placeholder="Select Date of Birth" type="date"
                                               value="{{$teacher->date_of_birth}}" name="date_of_birth">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="address"
                                               value="{{$teacher->address}}"
                                               placeholder="Bay Area, San Francisco, CA">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <h6 class="mb-4 text-primary">More Details</h6>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">About Me</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{$teacher->description}}"
                                               name="description" placeholder="Teacher">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Linkedin Profile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="linkedin"
                                               value="{{$teacher->linkedin}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Github Profile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="github"
                                               value="{{$teacher->github}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Stack Overflow Profile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="stack_overflow"
                                               value="{{$teacher->stack_overflow}}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                <a class="btn btn-danger" href="{{ Route('teacher.profile.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
