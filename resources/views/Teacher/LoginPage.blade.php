@extends("layouts.Home")

@section("teacherLogin")

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-7 intro-section">
                <div class="brand-wrapper">
                    <h1><a href="https://stackfindover.com/">Logo</a></h1>
                </div>
                <div class="intro-content-wrapper">
                    <h1 class="intro-title">Teacher Login Page   !</h1>
                    <p class="intro-text"> If You Are A Teacher THis Is Your Login Page  </p>
                    <a href="#!" class="btn btn-read-more">Read more</a>
                </div>
                <div class="intro-section-footer">
                    <na class="footer-nav">
                        <a href="#">Facebook</a>
                        <a href="#">Twitter</a>
                        <a href="#">Gmail</a>
                    </na>
                </div>
            </div>

            <div class="col-sm-6 col-md-5 form-section">
                <div class="login-wrapper">
                    <h2 class="login-title">Sign in</h2>
                    <form action="{{route("teacherLogin")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            @error("email")
                            <small class="text-danger">Please Enter E-Mail</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            @error("password")
                            <small class="text-danger">
                                Please Enter Password
                            </small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <input name="login" id="login" class="btn login-btn" type="submit" value="Login">
                            <a href="#!" class="forgot-password-link">Password?</a>
                        </div>

                    </form>
                    <p class="login-wrapper-footer-text">Need an account? <a href="#!" class="text-reset">Signup here</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("style")
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/Student/loginPage.css")}}">
@endsection

@section("script")
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>#</script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });</script>
@endsection
