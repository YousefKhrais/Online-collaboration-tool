<form class="row  d-flex justify-content-center " action="{{route("studentLobby")}}" method="get">

    @csrf
    <input type="hidden" :value="course_id" name="course_id">
    <input type="hidden" :value="course.teacher_id" name="teacher_id">
    <input value="Join Room" type="submit" class="btn btn-outline-success col-6">

</form>
