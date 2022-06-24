<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Collaboratibe Tool</title>
</head>

<body>

<div id="app">
    <Div class="row">
        <div class="col-4">
            <vue-sidebar-menu-akahon
                :menu-items="[
   {link: '#',name: 'DashBoard', tooltip: 'Dashboard', icon: 'bx-grid-alt' },
   {link: '#',name: 'Profile', tooltip: 'Dashboard', icon: 'bx-grid-alt' },
   {link: '#',name: 'Categories', tooltip: 'Dashboard', icon: 'bx-grid-alt' },
   {link: '#',name: 'Teachers', tooltip: 'Dashboard', icon: 'bx-grid-alt' },
   {link: '#',name: 'Explore', tooltip: 'Dashboard', icon: 'bx-grid-alt' },
   {link: '#',name: 'Profile', tooltip: 'Dashboard', icon: 'bx-grid-alt' },
   {link: '#',name: 'Your Courses', tooltip: 'Dashboard', icon: 'bx-grid-alt' },

   ]" :is-Search="false" :title="fsdfsdf" ></vue-sidebar-menu-akahon>
        </div>
 <div class="col-8">
     @yield("TeacherDashBoard")

 </div>

    </Div>




</div>
</body>
</html>

<script type="module" src="{{mix("js/app.js")}}">

</script>
