<li class="dropdown">
    <a href="#">
        <span>
            <img src="{{auth("teacher")->user()->image_link}}"
                   style="height:30px;  width: 30px; border-radius: 50%;"/>
                    {{auth("teacher")->user()->getFullName()}}
        </span>
        <i class="bi bi-chevron-down"></i>
    </a>
    <ul>
        <li><a href="{{route("teacher_courses")}}">My Courses</a></li>
        <li><a href="{{route("teacher.profile.index")}}">Profile</a></li>
        <li class="text-danger"><a href="{{route("teacherLogOut")}}">Log out</a></li>
    </ul>
</li>
