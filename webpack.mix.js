const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css').
js("resources/js/Student/categories.js","public/js/Student");

mix.js("resources/js/Student/LearnSession.js","public/js/Student");
// mix.js("resources/js/test.js","public/js").vue();
//
// mix.js("resources/js/ChatRoom/AgoraRTC_N-4.12.0.js","public/js/ChatRoom");
mix.js("resources/js/ChatRoom/room.js","public/js/ChatRoom");

mix.js(["resources/js/ChatRoom/room_rtc.js"],"public/js/ChatRoom");

mix.css("resources/css/ChatRoom/room.css","public/css/ChatRoom");
mix.css("resources/css/ChatRoom/main.css","public/css/ChatRoom");
mix.css("resources/css/Categories/coursesList.css","public/css/Categories");

mix.js("resources/js/Courses/courses.js","public/js/Courses").vue();
mix.js("resources/js/Courses/course_details.js","public/js/Courses").vue();
