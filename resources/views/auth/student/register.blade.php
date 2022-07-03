@extends("layouts.Home")

@section("loginPage")
</br>
</br>
</br>
<div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
        <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="my-5 display-3 fw-bold ls-tight">
                    The best offer <br/>
                    <span class="text-primary">for your business</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                    quibusdam tempora at cupiditate quis eum maiores libero
                    veritatis? Dicta facilis sint aliquid ipsum atque?
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card">
                    <div class="card-body py-5 px-md-5">
                        <div class="text-center">
                            <h2 class="fw-bold mb-5">Student Registration</h2>
                        </div>
                        <form action="{{route("StudentRegister")}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="first_name">First name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"/>
                                        @error("first_name")
                                        <small class="text-danger">
                                            {{ $message  }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="last_name">Last name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"/>
                                        @error("last_name")
                                        <small class="text-danger">
                                            {{ $message  }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="phone_number">Phone Number</label>
                                        <input type="number" name="phone_number" id="phone_number"
                                               class="form-control"/>
                                        @error("phone_number")
                                        <small class="text-danger">
                                            {{ $message  }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="0" selected>Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                        @error("gender")
                                        <small class="text-danger">
                                            {{ $message  }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" name="email" id="email" class="form-control"/>
                                @error("email")
                                <small class="text-danger">
                                    {{ $message  }}
                                </small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"/>
                                        @error("password")
                                        <small class="text-danger">
                                            {{ $message  }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                               class="form-control"/>
                                        @error("password_confirmation")
                                        <small class="text-danger">
                                            {{ $message  }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    I have read and agree to the terms
                                </label>
                            </div>

                            <div class="text-center p-3">
                                <button type="submit" class="btn btn-dark mb-3 w-50 rounded-pill">
                                    Register
                                </button>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    Already have an account?<a href="{{route("studentLogin")}}" class="fw-bold">
                                        Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{--                <form action="{{route("StudentRegister")}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="name" class="sr-only">User Name</label>--}}
{{--                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">--}}
{{--                        @error("name")--}}
{{--                        <small class="text-danger ">Your Should Enter User Name </small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="email" class="sr-only">E-Mail</label>--}}
{{--                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">--}}
{{--                        @error("email")--}}
{{--                        <small class="text-danger ">Your Should Enter Valid Email </small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group mb-3">--}}
{{--                        <label for="password" class="sr-only">Password</label>--}}
{{--                        <input type="password" name="password" id="password" class="form-control"--}}
{{--                               placeholder="Password">--}}
{{--                        @error("password")--}}
{{--                        <small class="text-danger ">Your Should Enter Valid Password </small>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="d-flex justify-content-between align-items-center mb-5">--}}
{{--                        <input name="login" id="login" class="btn login-btn" type="submit" value="Register">--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--                <p class="login-wrapper-footer-text">Already have an account? <a href="{{route("studentLogin")}}"--}}
{{--                       class="text-reset">Signin here</a></p>--}}
