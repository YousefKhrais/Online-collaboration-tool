@extends("layouts.Home")

@section("style")
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset("css/Student/editProfile.css")}}">

@endsection

@section("editStudentProfile")
<div class="container rounded bg-white mt-5 mb-5" id="editProfile">
    <input type="hidden" id="student_id" value="{{$student_id}}">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" :src="student.profile_pic" width="90">
                <span class="font-weight-bold">@{{ student.name }}</span>
                <span class="text-black-50">@{{ student.email }}</span>
            </div>
        </div>

        @include("Student.SubViews.EditProfileForm")

        @include("Student.SubViews.EditProfileSocialMedia")
    </div>
</div>
@endsection
@section("scripts")
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script src="{{asset("js/Student/editProfile.js")}}"></script>

<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });</script>

@endsection
