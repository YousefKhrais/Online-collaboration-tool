@extends("layouts.Home")
@section("courseDetails")

    <section style="background-color: white;" class="courses">
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
                            <li class="breadcrumb-item" aria-current="page">Teacher</li>
                            <li class="breadcrumb-item"><a href="{{route("teacher_courses")}}">My Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Course ({{$course->id}})</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div>
                <!-- ======= Cource Details Section ======= -->
                <section id="course-details" class="course-details" style="margin-top: -80px">
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>{{$course->title}}</h3>
                                </br>
                            </div>
                            <div class="col-lg-8">
                                <img src="{{$course->image_link}}" style="border-radius: 3%" class="img-fluid" alt="">
                                </br>
                                </br>
                                <h3>Course Details</h3>
                            </div>
                            <div class="col-lg-4">
                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Teacher</h5>
                                    <p><a href="#">{{$course->teacher->getFullName()}}</a></p>
                                </div>

                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Course Fee</h5>
                                    <p>{{$course->price}}</p>
                                </div>

                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Available Seats</h5>
                                    <p>30</p>
                                </div>

                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Category</h5>
                                    <p>{{$course->category->title}}</p>
                                </div>

                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Schedule</h5>
                                    <div>
                                        <p class="text-success">
                                            Hours : 5.00 pm - 7.00 pm
                                        </p>
                                        <p class="text-success">Days : saturday-sunday</p>
                                    </div>
                                </div>

                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Students Count</h5>
                                    <p>{{$course->getStudentsCount()}}</p>
                                </div>

                                @auth("teacher")
                                    <form class="row d-flex justify-content-center" method="post" action="{{route("teacherJoinRoom")}}">
                                        @csrf
                                        <input name="course_id" type="hidden" value="{{$course->id}}">
                                        <input value="Course Room" type="submit"
                                               class="btn btn-outline-success col-4 m-3">
                                        <a class="btn btn-outline-success col-4 m-3" href="{{ URL('teacher/courses/settings/'.$course->id) }}"><i class="fas fa-folder"></i>Course Settings</a>
                                    </form>
                                @endauth

                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
        <section id="cource-details-tabs" class="cource-details-tabs">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Requirements</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Syllabus</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Outline</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Course Description</h3>
                                        <p class="fst-italic">{{$course->description}}</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset("Home/assets/img/course-details-tab-1.png")}}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Course Requirements</h3>
                                        @if(!empty($course->requirements))
                                            <p class="fst-italic">{{$course->requirements}}</p>
                                        @else
                                            <p class="fst-italic">This course does not have any requirements.</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset("Home/assets/img/course-details-tab-2.png")}}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Course Syllabus</h3>
                                        @if(!empty($course->syllabus))
                                            <p class="fst-italic">{{$course->syllabus}}</p>
                                        @else
                                            <p class="fst-italic">This course does not have a syllabus.</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset("Home/assets/img/course-details-tab-3.png")}}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Course Schedule</h3>
                                        @if(!empty($course->schedule))
                                            <p class="fst-italic">{{$course->schedule}}</p>
                                        @else
                                            <p class="fst-italic">This course does not have a schedule.</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset("Home/assets/img/course-details-tab-4.png")}}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Course Outline</h3>
                                        @if(!empty($course->outline))
                                            <p class="fst-italic">{{$course->outline}}</p>
                                        @else
                                            <p class="fst-italic">This course does not have an outline.</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{asset("Home/assets/img/course-details-tab-5.png")}}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </section>
@endsection
