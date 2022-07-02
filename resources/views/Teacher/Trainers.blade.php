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
                                        @if(!empty($teacher->twitter))
                                            <a href="{{$teacher->twitter}}"><i class="bi bi-twitter"></i></a>
                                        @endif

                                        @if(!empty($teacher->facebook))
                                            <a href="{{$teacher->facebook}}"><i class="bi bi-facebook"></i></a>
                                        @endif

                                        @if(!empty($teacher->instagram))
                                            <a href="{{$teacher->instagram}}"><i class="bi bi-instagram"></i></a>
                                        @endif

                                        @if(!empty($teacher->linkedin))
                                            <a href="{{$teacher->linkedin}}"><i class="bi bi-linkedin"></i></a>
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
