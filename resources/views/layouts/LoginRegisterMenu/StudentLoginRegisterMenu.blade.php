<li class="dropdown">
    <a href="#">
            <span>
                <img src="{{auth("student")->user()->profile_pic}}" style="height:30px;  width: 30px; border-radius: 50%;"/>
        </span>
        <i class="bi bi-chevron-down"></i>
    </a>
    <ul>
        <li><a href="#">Courses</a></li>
        <li><a href="{{route("StudentProfile")}}">Profile</a></li>
        <li><a href="#">Payment</a></li>
        <li   class="text-danger"><a  href="{{route("studentLogout")}}">LogOut</a></li>
    </ul>
</li>
