<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="app3">

</div>


</body>
</html>
<script src="{{mix("js/test.js")}}"></script>

<script>
    window.addEventListener("load",function (){
        const app3= new Vue({
            el:"#app3",
            mounted(){
                console.log("start application");

            }
        });
    });

</script>
