@extends("layouts.Student")
@section("StudentBrowseCategories")

    <div class="container-fluid" id="categories">
        <div class="row">

                {{--                display to cards--}}
                @foreach($categories as $cat)

                <div class="col-sm-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset("Test/test.png")}}" alt="the image alt text here">

                        <div class="card-body text-center">

                            <h5 class="card-title text-center">{{$cat->name}}</h5>

                            <p class="card-text text-left">{{$cat->description}}</p>

                            <a href="{{route("categoryCourses",[$cat->id])}}" class="btn btn-warning text-right">Explore</a>

                        </div>
                    </div>
                </div>

            @endforeach
            {{--            end of cards--}}

        </div>
    </div>

    <script type="module" src="{{mix("js/Student/categories.js")}}" >

    </script>

@endsection
