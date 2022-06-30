<li class="dropdown">
    <a href="#">
            <span>
                <img src="{{auth("teacher")->user()->profile_image}}" style="height:30px;  width: 30px; border-radius: 50%;"/>
        </span>
        <i class="bi bi-chevron-down"></i>
    </a>
    <ul>
        <li><a href="{{route("teacher_courses")}}">Courses</a></li>
        <li><a href="{{route("teacherProfile")}}">Profile</a></li>
        <li><a href="#">Payment</a></li>
        <li   class="text-danger"><a  href="{{route("teacherLogOut")}}">LogOut</a></li>
    </ul>
</li>
