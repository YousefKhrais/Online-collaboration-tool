@extends("layouts.Home")
@section("trainers")

    <main id="main" data-aos="fade-in">
        <div class="breadcrumbs">
            <div class="container">
                <h2>Trainers</h2>
                <p>Here is a list of our talented trainers</p>
            </div>
        </div>

        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Trainers</h2>
                    <p>Talented Trainers</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($teachers  as $teacher)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <img src="{{$teacher->image_link}}" class="img-fluid" alt="">
                                <div class="member-content">
                                    <h4>{{$teacher->getFullName()}}</h4>
                                    <span>{{$teacher->getCoursesCount()}} Courses</span>
                                    <p>
                                        {{$teacher->description}}
                                    </p>
                                    <div class="social">
                                        @if(!empty($teacher->linkedin))
                                            <a href="{{$teacher->linkedin}}"><i class="bi bi-linkedin"></i></a>
                                        @endif

                                            @if(!empty($teacher->github))
                                            <a href="{{$teacher->github}}"><i class="bi bi-github"></i></a>
                                        @endif

                                        @if(!empty($teacher->stack_overflow))
                                            <a href="{{$teacher->stack_overflow}}"><i class="bi bi-stack-overflow"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
@endsection
