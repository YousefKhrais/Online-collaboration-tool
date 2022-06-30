@extends("layouts.Home")

@section("TeacherCourses")

    <div class="container ">
        @foreach($courses as $c)
            <div class="row justify-content-center">
                <div class="card col-10">
                    <div class="card-header">
                        <div class="card-title ">
                            Course Title: <span class="text-primary"><{{$c->title}}/span>
                        </div>

                    </div>

                    <div class="card-img">
                        <img src="{{$c->image}}" style="width: 100%; height: 300px;">
                    </div>

                    <div class="card-body">
                        <h3>Course Info</h3>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Numfer Of Hours</strong>
                                <span class="badge badge-primary  text-primary">{{$c->num_of_hours}}</span>
                            </li>

                            <li class="list-group-item">
                                <strong>Price</strong>
                                <span class="badge badge-primary  text-primary">{{$c->price}}</span>
                            </li>

                            <li class="list-group-item">
                                <strong>Brief Description</strong>
                                <span class="badge badge-primary  text-primary">{{$c->description}}</span>
                            </li>

                        </ul>
                    </div>

                    <form class="card-footer row"
                          method="get" action="{{route("teacherLobby")}}">
                        <input type="hidden" value="{{$c->course_id}}">
                        <input type="submit"  value="Go To Course" class="btn btn-sm btn-success">
                    </form>

                </div>
            </div>
            <hr>

        @endforeach
    </div>>

@endsection
