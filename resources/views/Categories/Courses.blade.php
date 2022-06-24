@extends("layouts.Student")

@section("CategoryCourses")


    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Featured Product</h3>
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
            <div class="row w-100 ">
                @foreach($courses as $c)
                    {{--             start course--}}
                    <div class="card mb-3 col-12">
                        <img  style=" height: 400px" src="https://images.theconversation.com/files/447353/original/file-20220218-45245-1hgu9fk.jpg?ixlib=rb-1.1.0&rect=51%2C0%2C5700%2C3771&q=20&auto=format&w=320&fit=clip&dpr=2&usm=12&cs=strip" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$c->title}}</h5>

                            <p class="card-text ">Number Of Houres  is <span class="text-success">{{$c->num_of_hours}}</span> </p>

                            <p class="card-text"><small class="text-muted">Last updated {{$c->updated_at}}</small></p>

                            <p class="card-text">Instructed By
                                <a  href="#" class="card-link">
                                    <span class="text-success">
                                        {{\App\Models\teacher::find($c->teacher_id)->name}}
                                     </span>
                                </a>
                            </p>
                            <button class="btn btn-link btn-sm">View More</button>
                        </div>
                    </div>
                    {{--end course--}}
                    @endforeach


            </div>
        </div>
    </section>

@endsection
@section("style")
    <link rel="stylesheet" href="{{mix("css/Categories/coursesList.css")}}">
@endsection
