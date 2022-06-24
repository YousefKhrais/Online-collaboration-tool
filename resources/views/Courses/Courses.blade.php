@extends("layouts.Home")
@section("courses")

<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Courses</h2>
            <p> Here Is our paid Courses </p>
        </div>
    </div><!-- End Breadcrumbs -->
    <div id="coursesPage">

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses" >
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" v-for="c in courses" :key="c.id">
                    <div class="course-item">
                        <img v-bind:src="c.image" class="img-fluid" alt="Course Image">
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>Price</h4>
                                <p class="price">@{{c.price}}</p>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Hours</h4>
                            <p class="price">@{{c.num_of_hours}}</p>
                        </div>

                            <h3><a href="course-details.html">Copywriting</a></h3>
                            <p>@{{c.description}}</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                    <img v-bind:src="c.profile_image" alt=""/>

                                    <span class="btn btn-link">@{{c.name}}</span>

                                </div>
                                <div class="trainer-rank d-flex align-items-center">
                                    <i class="bx bx-user"></i>&nbsp;20
                                    &nbsp;&nbsp;
                                    <i class="bx bx-heart"></i>&nbsp;85
                                </div>

                            </div>
                            <a href="#" class="btn btn-success btn-sm">View Details</a>

                        </div>
                    </div>
                </div> <!-- End Course Item-->

            </div>

        </div>
    </section><!-- End Courses Section -->
    </div>
</main><!-- End #main -->

@endsection

@section("scripts")
<script src="{{asset("js/Courses/courses.js")}}">

</script>
@endsection
