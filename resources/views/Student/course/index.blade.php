@extends("layouts.Home")
@section("studentProfile")

    <section style="background-color: #eee;" class="courses">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Student</li>
                            <li class="breadcrumb-item active" aria-current="page">My Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>My Courses</h2>
                </div>
                @foreach($student->courses->chunk(3) as $courses_row)
                    <div class="row course-set courses__row">
                        @foreach($courses_row as $course)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                                <div class="course-item bg-light">
                                    <img src="{{asset("Home/assets/img/course-2.jpg")}}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4>{{$course->category->title}}</h4>
                                            <h4 class="bg-info">{{$course->num_of_hours}} Hours</h4>
                                        </div>
                                        <h3>
                                            <a href="{{ URL('student/courses/view/'.$course->id) }}">{{$course->title}}</a>
                                        </h3>
                                        <p class="text-break">{{$course->description}}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <form method="post"   action="{{route("studentJoinRoom")}}" class="d-flex align-items-center">
                                                @csrf
                                                <input  type="hidden" name="course_id" value="{{$course->id}}">
                                                <input type="submit" class="btn btn-sm btn-success"
                                                       value="Course Room">
                                            </form>

                                            <div class="trainer-rank d-flex align-items-center">
                                                <i class="bx bx-user"></i>&nbsp;{{$course->getStudentsCount()}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </br>
                @endforeach
            </div>
        </div>
    </section>
@endsection
