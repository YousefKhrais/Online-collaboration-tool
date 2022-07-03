@extends("layouts.Home")

@section("TeacherCourses")

    <main id="main" data-aos="fade-in">

        <div class="breadcrumbs">
            <div class="container">
                <h2>Courses</h2>
            </div>
        </div>

        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>My Courses</h2>
                </div>

                @foreach($teacher->courses->chunk(3) as $courses_row)
                    <div class="row course-set courses__row">
                        @foreach($courses_row as $course)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                                <div class="course-item">
                                    <img src="{{asset("Home/assets/img/course-2.jpg")}}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4>{{$course->category->title}}</h4>
                                            <h4 class="bg-info">{{$course->num_of_hours}} Hours</h4>
                                        </div>
                                        <h3>
                                            <a href="{{ URL('courses/'.$course->id) }}">{{$course->title}}</a>
                                        </h3>
                                        <p>{{$course->description}}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a class="btn btn-sm btn-success" href="{{route("teacherLobby")}}">Course Room</a>
                                            </div>
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
        </section>
    </main>

    {{--        <div class="container ">--}}
    {{--            @foreach($teacher->courses as $c)--}}
    {{--                <div class="row justify-content-center">--}}
    {{--                    <div class="card col-10">--}}
    {{--                        <div class="card-header">--}}
    {{--                            <div class="card-title ">--}}
    {{--                                Course Title: <span class="text-primary"><{{$c->title}}/span>--}}
    {{--                            </div>--}}

    {{--                        </div>--}}

    {{--                        <div class="card-img">--}}
    {{--                            <img src="{{$c->image_link}}" style="width: 100%; height: 300px;">--}}
    {{--                        </div>--}}

    {{--                        <div class="card-body">--}}
    {{--                            <h3>Course Info</h3>--}}
    {{--                            <ul class="list-group">--}}
    {{--                                <li class="list-group-item">--}}
    {{--                                    <strong>Numfer Of Hours</strong>--}}
    {{--                                    <span class="badge badge-primary  text-primary">{{$c->num_of_hours}}</span>--}}
    {{--                                </li>--}}

    {{--                                <li class="list-group-item">--}}
    {{--                                    <strong>Price</strong>--}}
    {{--                                    <span class="badge badge-primary  text-primary">{{$c->price}}</span>--}}
    {{--                                </li>--}}

    {{--                                <li class="list-group-item">--}}
    {{--                                    <strong>Brief Description</strong>--}}
    {{--                                    <span class="badge badge-primary  text-primary">{{$c->description}}</span>--}}
    {{--                                </li>--}}

    {{--                            </ul>--}}
    {{--                        </div>--}}

    {{--                        <form class="card-footer row"--}}
    {{--                              method="get" action="{{route("teacherLobby")}}">--}}
    {{--                            <input type="hidden" value="{{$c->course_id}}">--}}
    {{--                            <input type="submit" value="Go To Course" class="btn btn-sm btn-success">--}}
    {{--                        </form>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <hr>--}}

    {{--            @endforeach--}}
    {{--        </div>>--}}

@endsection
