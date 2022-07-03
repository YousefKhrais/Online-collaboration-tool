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
                            <h2 class="fw-bold mb-5">Student Login</h2>
                        </div>
                        <form action="{{route("studentLogin")}}" method="post">
                            @csrf
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" name="email" id="email" class="form-control"/>
                                @error("email")
                                <small class="text-danger">{{ $message  }}</small>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"/>
                                @error("password")
                                <small class="text-danger">
                                    {{ $message  }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="text-center p-3">
                                @error("login")
                                <small class="text-danger">
                                    {{ $message  }}
                                </small>
                                @enderror
                            </div>

                            <div class="text-center p-3">
                                <button type="submit" class="btn btn-dark mb-3 w-50 rounded-pill">
                                    Login
                                </button>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    Don't have an account?<a href="{{route("StudentRegister")}}" class="fw-bold">
                                        Register</a>
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
