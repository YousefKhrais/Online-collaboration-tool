@extends("layouts.Home")
@section("trainers")

    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Trainers</h2>
                <p>  Here Are List Of All Trainers </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($teachers  as $t)

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{$t->profile_image}}" style="border-radius: 20%" class="img-fluid" alt="">
                            <div class="member-content">
                                <h4>{{$t->name}}</h4>
                                @foreach(\GuzzleHttp\json_decode($t->interests) as $i)
                                 <span>{{$i}}</span>
                                @endforeach
                                <p>
                                    {{$t->description}}
                                </p>
                                <div class="social">
                                    @if(empty($t->twitter)===false)
                                        <a href="{{$t->twitter}}"><i class="bi bi-twitter"></i></a>
                                    @endif

                                    @if(empty($t->facebook)===false)

                                        <a href="{{$t->facebook}}"><i class="bi bi-facebook"></i></a>
                                    @endif

                                    @if(empty($t->instagram)===false)

                                        <a href="{{$t->instagram}}"><i class="bi bi-instagram"></i></a>
                                    @endif

                                    @if(empty($t->linkedin)===false)
                                        <a href="{{$t->linkedin}}"><i class="bi bi-linkedin"></i></a>
                                    @endif

                                </div>
                                <a class="btn btn-sm btn-link text-success" href="#">Visit Profile</a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>

            </div>
        </section><!-- End Trainers Section -->
@endsection
