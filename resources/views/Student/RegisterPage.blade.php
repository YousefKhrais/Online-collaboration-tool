<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        body {
            background-color: #fff;
            font-family: 'Karla', sans-serif;
        }

        h1 > a {
            text-decoration: none;
            color: #fff !important;
        }

        .intro-section {
            background-image: url(https://i.ibb.co/t2tbbh6/pexels-luis-quintero-2471234.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 75px 95px;
            min-height: 100vh;
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            color: #ffffff;
        }

        @media (max-width: 991px) {
            .intro-section {
                padding-left: 50px;
                padding-rigth: 50px;
            }
        }

        @media (max-width: 767px) {
            .intro-section {
                padding: 28px;
            }
        }

        @media (max-width: 575px) {
            .intro-section {
                min-height: auto;
            }
        }

        .brand-wrapper .logo {
            height: 35px;
        }

        @media (max-width: 767px) {
            .brand-wrapper {
                margin-bottom: 35px;
            }
        }

        .intro-content-wrapper {
            width: 410px;
            max-width: 100%;
            margin-top: auto;
            margin-bottom: auto;
        }

        .intro-content-wrapper .intro-title {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 17px;
        }

        .intro-content-wrapper .intro-text {
            font-size: 19px;
            line-height: 1.37;
        }

        .intro-content-wrapper .btn-read-more {
            background-color: #fff;
            padding: 13px 30px;
            border-radius: 0;
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }

        .intro-content-wrapper .btn-read-more:hover {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
        }

        @media (max-width: 767px) {
            .intro-section-footer {
                margin-top: 35px;
            }
        }

        .intro-section-footer .footer-nav a {
            font-size: 20px;
            font-weight: bold;
            color: inherit;
        }

        @media (max-width: 767px) {
            .intro-section-footer .footer-nav a {
                font-size: 14px;
            }
        }

        .intro-section-footer .footer-nav a + a {
            margin-left: 30px;
        }

        .form-section {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
        }

        @media (max-width: 767px) {
            .form-section {
                padding: 35px;
            }
        }

        .login-wrapper {
            width: 300px;
            max-width: 100%;
        }

        @media (max-width: 575px) {
            .login-wrapper {
                width: 100%;
            }
        }

        .login-wrapper .form-control {
            border: 0;
            border-bottom: 1px solid #e7e7e7;
            border-radius: 0;
            font-size: 14px;
            font-weight: bold;
            padding: 15px 10px;
            margin-bottom: 7px;
        }

        .login-wrapper .form-control::-webkit-input-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control::-moz-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control:-ms-input-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control::-ms-input-placeholder {
            color: #b0adad;
        }

        .login-wrapper .form-control::placeholder {
            color: #b0adad;
        }

        .login-title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .login-btn {
            padding: 13px 30px;
            background-color: #000;
            border-radius: 0;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
        }

        .login-btn:hover {
            border: 1px solid #000;
            background-color: transparent;
            color: #000;
        }

        .forgot-password-link {
            font-size: 14px;
            color: #080808;
            text-decoration: underline;
        }

        .social-login-title {
            font-size: 15px;
            color: #919aa3;
            display: -webkit-box;
            display: flex;
            margin-bottom: 23px;
        }

        .social-login-title::before, .social-login-title::after {
            content: "";
            background-image: -webkit-gradient(linear, left top, left bottom, from(#f4f4f4), to(#f4f4f4));
            background-image: linear-gradient(#f4f4f4, #f4f4f4);
            -webkit-box-flex: 1;
            flex-grow: 1;
            background-size: calc(100% - 20px) 1px;
            background-repeat: no-repeat;
        }

        .social-login-title::before {
            background-position: center left;
        }

        .social-login-title::after {
            background-position: center right;
        }

        .social-login-links {
            text-align: center;
            margin-bottom: 32px;
        }

        .social-login-link img {
            width: 40px;
            height: 40px;
            -o-object-fit: contain;
            object-fit: contain;
        }

        .social-login-link + .socia-login-link {
            margin-left: 16px;
        }

        .login-wrapper-footer-text {
            font-size: 14px;
            text-align: center;
        }</style>
</head>
<body className='snippet-body'>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">
</head>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-7 intro-section">
            <div class="brand-wrapper">
                <h1><a href="https://stackfindover.com/">Logo</a></h1>
            </div>
            <div class="intro-content-wrapper">
                <h1 class="intro-title">Welcome to website !</h1>
                <p class="intro-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna</p>
                <a href="#!" class="btn btn-read-more">Read more</a>
            </div>
            <div class="intro-section-footer">
                <na class="footer-nav">
                    <a href="#!">Facebook</a>
                    <a href="#!">Twitter</a>
                    <a href="#!">Gmail</a>
                </na>
            </div>
        </div>
        <div class="col-sm-6 col-md-5 form-section">
            <div class="login-wrapper">
                <h2 class="login-title">Sign Up</h2>

                <form action="{{route("StudentRegister")}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="sr-only">User Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                        @error("name")
                        <small class="text-danger ">Your Should Enter User Name </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="sr-only">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                        @error("email")
                        <small class="text-danger ">Your Should Enter Valid Email </small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Password">
                        @error("password")
                        <small class="text-danger ">Your Should Enter Valid Password </small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <input name="login" id="login" class="btn login-btn" type="submit" value="Register">
                    </div>

                </form>

                <p class="login-wrapper-footer-text">Already have an account? <a href="{{route("studentLogin")}}"
                                                                                 class="text-reset">Signin
                        here</a></p>

            </div>
        </div>
    </div>
</div>

<script type='text/javascript'
        src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript'></script>
<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function (e) {
        e.preventDefault();
    });</script>

</body>
</html>
