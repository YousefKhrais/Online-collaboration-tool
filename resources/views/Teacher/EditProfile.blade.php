@extends("layouts.Home")

@section("style")
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset("css/Student/editProfile.css")}}">
@endsection

@section("editTeacherProfile")
<div class="container rounded bg-white mt-5 mb-5" id="editProfile">
    <input type="hidden" id="teacher_id" value="{{$teacher_id}}">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" :src="teacher.profile_image" width="90">
                <span class="font-weight-bold">@{{ teacher.name }}</span>
                <span class="text-black-50">@{{ teacher.email }}</span>
            </div>
        </div>

        @include("Teacher.SubViews.EditProfileForm")

        @include("Teacher.SubViews.EditProfileSocialMedia")
    </div>
</div>
@endsection
@section("scripts")
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script src="{{asset("js/Teacher/EditProfile.js")}}"></script>

<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });
</script>

@endsection
