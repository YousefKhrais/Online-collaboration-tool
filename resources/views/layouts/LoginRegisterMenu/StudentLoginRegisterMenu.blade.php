<li class="dropdown">
    <a href="#">
        <span><img src="{{auth("student")->user()->image_link}}"
                   style="height:30px;  width: 30px; border-radius: 50%;"/>  {{auth("student")->user()->getFullName()}}</span>
        <i class="bi bi-chevron-down"></i>
    </a>
    <ul>
        <li><a href="{{route("student.courses.index")}}">My Courses</a></li>
        <li><a href="{{route("student.profile.index")}}">Profile</a></li>
        <li class="text-danger"><a href="{{route("studentLogout")}}">Log out</a></li>
    </ul>
</li>
