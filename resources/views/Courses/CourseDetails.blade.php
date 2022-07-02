@extends("layouts.Home")

@section("courseDetails")

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            @if (session()->has('update_status'))
                @if (session('update_status'))
                    <div class="alert alert-success">Updated Successfully</div>
                @else
                    <div class="alert alert-danger">Failed to update student</div>
                @endif
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container">
                <h2>Course Details</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <div id="myApp">
            <input id="course_id" type="hidden" value="{{$course_id}}"/>
            <!-- ======= Cource Details Section ======= -->
            <section id="course-details" class="course-details">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-lg-8">
                            <img style="height: 500px; width: 100% ; border-radius: 10%;" :src="course.image_link"
                                 class="img-fluid" alt="">
                            <h3>@{{course.title}}</h3>
                            <p>
                                @{{course.description}}
                            </p>
                        </div>
                        <div class="col-lg-4">

                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Trainer</h5>
                                <p><a href="#">@{{course.title}}</a></p>
                            </div>

                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Course Fee</h5>
                                <p>@{{course.price}}</p>
                            </div>

                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>AvailabCategole Seats</h5>
                                <p>30</p>
                            </div>

                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Category</h5>
                                <p>@{{course.category_name }}</p>
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

                            @auth("student")
                                @if($is_registered===true)
                                    @include("Courses.SubViews.CourseRoomForm")
                                @else
                                    @include("Courses.SubViews.CourseEntrollForm")
                                @endif

                            @endauth

                        </div>
                    </div>

                </div>
            </section><!-- End Cource Details Section -->
        </div>
        @include("Courses.SubViews.CourseRequirementsDetails")
    </main><!-- End #main -->

@endsection

@section("scripts")
    <script src="{{asset("js/Courses/course_details.js")}}">
    </script>
@endsection
