@extends("layouts.Home")
@section("courses")

    <main id="main" data-aos="fade-in">

        <div class="breadcrumbs">
            <div class="container">
                <h2>Courses</h2>
                <p> Here is our most popular courses</p>
            </div>
        </div>

        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Courses</h2>
                    <p>Popular Courses</p>
                </div>

                @foreach($courses->chunk(3) as $courses_row)
                    <div class="row course-set courses__row">
                        @foreach($courses_row as $course)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                                <div class="course-item">
                                    <img src="{{asset("Home/assets/img/course-2.jpg")}}" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4>{{$course->category->title}}</h4>
                                            <h4 class="bg-info">{{$course->num_of_hours}} Hours</h4>
                                            <p class="price">${{$course->price}}</p>
                                        </div>

                                        <h3><a href="{{ URL('courses/'.$course->id) }}">{{$course->title}}</a>
                                        </h3>
                                        <p>{{$course->description}}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <img src="{{$course->teacher->image_link}}"
                                                     class="img-fluid"
                                                     alt="">
                                                <span>{{$course->teacher->getFullName()}}</span>
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
@endsection
