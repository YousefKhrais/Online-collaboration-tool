@extends("layouts.Home")
@section("courseDetails")

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
                            <li class="breadcrumb-item" aria-current="page">Teacher</li>
                            <li class="breadcrumb-item"><a href="{{route("teacher_courses")}}">My Courses</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Course ({{$course->id}})</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card w-100 p-3">
                <div class="card-header p-2">
                    <div class="tabs-menu1">
                        <ul class="nav nav-pills">
                            <li class="nav-item ml-4">
                                <a class="nav-link active" data-toggle="tab" href="#tab0">Course Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab1">Students</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab0">
                            <form method="post" action="{{ URL('teacher/courses/update/'.$course->id) }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="column p-2 w-100">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="container">
                                                        <div class="form-group">
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label class="form-label mb-0 mt-2">Course
                                                                        Title</label>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           placeholder="Course Title"
                                                                           readonly value="{{$course->title}}">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label class="form-label mb-0 mt-2">Course
                                                                        Credits</label>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="number"
                                                                           placeholder="Course Credits" readonly
                                                                           value="{{$course->num_of_hours}}">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label class="form-label mb-0 mt-2">Course
                                                                        Price</label>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="number"
                                                                           placeholder="Course Price"
                                                                           readonly value="{{$course->price}}">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label class="form-label mb-0 mt-2">Course
                                                                        Image</label>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                           placeholder="Course Image"
                                                                           name="image_link"
                                                                           value="{{$course->image_link}}">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="form-label mb-0 mt-2">Description</label>
                                                                </div>
                                                                <div class="col">
                                                            <textarea class="form-control"
                                                                      placeholder="Description"
                                                                      name="description"
                                                                      rows="5">{{$course->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-3">
                                                                    <label class="form-label mb-0 mt-2">Students
                                                                        Count</label>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="number"
                                                                           placeholder="Students Count" disabled
                                                                           value="{{$course->getStudentsCount()}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="container">
                                                                <div class="form-group">
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-3">
                                                                            <label
                                                                                class="form-label mb-0 mt-2">Schedule</label>
                                                                        </div>
                                                                        <div class="col">
                                                                        <textarea class="form-control" type="text"
                                                                                  placeholder="Course Schedule"
                                                                                  name="schedule"
                                                                                  rows="3">{{$course->schedule}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-3">
                                                                            <label class="form-label mb-0 mt-2">Requirements</label>
                                                                        </div>
                                                                        <div class="col">
                                                                        <textarea class="form-control" type="text"
                                                                                  placeholder="Course Requirements"
                                                                                  name="requirements"
                                                                                  rows="3">{{$course->requirements}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-3">
                                                                            <label
                                                                                class="form-label mb-0 mt-2">Syllabus</label>
                                                                        </div>
                                                                        <div class="col">
                                                                        <textarea class="form-control" type="text"
                                                                                  placeholder="Course Syllabus"
                                                                                  name="syllabus"
                                                                                  rows="3">{{$course->syllabus}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-md-3">
                                                                            <label
                                                                                class="form-label mb-0 mt-2">Outline</label>
                                                                        </div>
                                                                        <div class="col">
                                                                        <textarea class="form-control" type="text"
                                                                                  placeholder="Course Outline"
                                                                                  name="outline"
                                                                                  rows="3">{{$course->outline}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <a class="btn btn-danger" href="{{ URL('teacher/courses/view/'.$course->id) }}">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="tab1">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="btn btn-primary btn-sm" style="float: right;"
                                               data-target="#enrollStudentModal"
                                               data-toggle="modal" href="#"><i class="fas fa-folder"></i>
                                                Enroll Student</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="teachers_table"
                                                       class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 1%">#</th>
                                                        <th style="width: 15%">Student Name</th>
                                                        <th style="width: 5%">Image</th>
                                                        <th style="width: 20%">Email</th>
                                                        <th style="width: 5%">Gender</th>
                                                        <th style="width: 15%">Phone Number</th>
                                                        <th style="width: 8%"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($course->students as $student)
                                                        <tr>
                                                            <td>{{$student->id}}</td>
                                                            <td>{{$student->getFullName()}}</td>
                                                            <td class="text-center">
                                                                <img src="{{$student->image_link}}"
                                                                     class="img-circle elevation-2"
                                                                     style="height: 40px" alt="User Image">
                                                            </td>
                                                            <td>{{$student->email}}</td>
                                                            <td>{{$student->getGender()}}</td>
                                                            <td>{{$student->phone_number}}</td>
                                                            <td class="project-actions text-left">
                                                                <form style="display: inline-block;" method="POST"
                                                                      action="{{ URL('teacher/courses/unenroll/'.$course->id) }}">
                                                                    <input type="hidden" name="_token"
                                                                           value="{{ csrf_token() }}">
                                                                    <input type="hidden" name="student_id"
                                                                           value="{{ $student->id }}">
                                                                    <button class="btn btn-danger btn-sm"
                                                                            title="Unenroll" type="submit">
                                                                        <i class="fas fa-user-minus">Unenroll</i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="modal fade" id="enrollStudentModal">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enroll Student</h5>
                        <button aria-label="Close" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="{{ URL('teacher/courses/enroll/'.$course->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Course Title</label>
                                <input class="form-control" placeholder="Course Title" value="{{$course->title}}"
                                       type="text" disabled>
                            </div>
                            </br>
                            <div class="form-group">
                                <label class="form-label">Select Student</label>
                                <select class="form-control" multiple="multiple" name="student_id[]">
                                    @foreach ($students as $student)
                                        @if(!$course->isStudentEnrolled($student))
                                            <option value="{{$student->id}}">{{$student->id}}
                                                - {{$student->getFullName()}}</option>
                                        @endif
                                    @endforeach
                                </select>
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
