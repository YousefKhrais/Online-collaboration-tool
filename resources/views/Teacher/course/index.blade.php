@extends("layouts.Home")
@section("studentProfile")

    <section style="background-color: #eee;" class="courses">
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
                            <li class="breadcrumb-item active" aria-current="page">My Courses</li>
                        </ol>

                        <a class="fab d-flex align-items-center justify-content-center"
                           data-target="#addCourseModal" data-toggle="modal" href="#">
                            <i class="bi bi-plus"></i>
                        </a>

                    </nav>
                </div>
            </div>
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>My Courses</h2>
                </div>
                @foreach($teacher->courses->chunk(3) as $courses_row)
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
                                            <a href="{{ URL('teacher/courses/view/'.$course->id) }}">
                                                {{$course->title}}
                                            </a>

                                        </h3>
                                        <p class="text-break">{{$course->description}}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <form method="post" action="{{route("teacherJoinRoom")}}"
                                                  class="d-flex align-items-center">
                                                @csrf
                                                <input name="course_id" type="hidden" value="{{$course->id}}">
                                                <input type="submit" value="Course Room" class="btn btn-sm btn-success">
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

    <div class="modal fade" id="addCourseModal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request To Add New Course</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('request.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group p-1">
                            <label class="form-label">Course Title</label>
                            <input class="form-control" placeholder="Enter Course Title" type="text"
                                   name="title">
                        </div>
                        <div class="form-group p-1">
                            <label class="form-label">Number Of Hours (Course Credit)</label>
                            <input class="form-control" placeholder="Enter Course Credit" type="number"
                                   name="credit">
                        </div>
                        <div class="form-group p-1">
                            <label class="form-label">Course Price</label>
                            <input class="form-control" placeholder="Enter Course Price" type="number"
                                   name="price">
                        </div>
                        <div class="form-group p-1">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="category_id">
                                <option value="0" selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group p-1">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description"
                                      placeholder="Course Description"
                                      rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
