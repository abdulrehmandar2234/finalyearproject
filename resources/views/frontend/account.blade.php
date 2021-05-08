@extends('layouts.shop')
@section('content')
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">My
                            Account
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">My Account</h1>
        </div>
        <div class="my-4 my-xl-8">
            <div class="row">
                @guest
                    <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Login</h3>
                        </div>
                        <p class="text-gray-90 mb-4">Welcome back! Sign in to your account.</p>
                        <!-- End Title -->
                        <form class="js-validate" novalidate="novalidate" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrEmailExample3">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="signinSrEmailExample3"
                                       placeholder="Email" aria-label="Email"
                                       data-msg="Please enter a valid email address."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success"
                                       value="{{ old('email') }}" autocomplete="email" autofocus
                                       aria-describedby="signinEmailLabel" required>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="signinPassword"
                                       placeholder="Password" aria-label="Password"
                                       aria-describedby="signinPasswordLabel"
                                       required autocomplete="current-password"
                                       data-msg="Your password is invalid. Please try again."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="js-form-message mb-3">
                                <div class="js-form-message mb-3">
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input" id="remember"
                                               name="remember"
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label form-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Login</button>
                                </div>
                                <div class="mb-2">
                                    <a class="text-blue" href="#">Lost your password?</a>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                    </div>
                    <div class="col-md-1 d-none d-md-block">
                        <div class="flex-content-center h-100">
                            <div class="width-1 bg-1 h-100"></div>
                            <div
                                class="width-50 height-50 border border-color-1 rounded-circle flex-content-center font-italic bg-white position-absolute">
                                or
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Register</h3>
                        </div>
                        <p class="text-gray-90 mb-4">Create new account today to reap the benefits of a personalized
                            shopping experience.</p>
                        <!-- End Title -->
                        <!-- Form Group -->
                        <form class="js-validate" novalidate="novalidate" method="POST"
                              action="{{ route('register') }}">
                        @csrf
                        <!-- Form Group -->
                            <div class="form-group">
                                <div class="js-form-message js-focus-state">
                                    <label class="sr-only" for="name">{{ __('Name') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="name">
                                                    <span class="fas fa-user"></span>
                                                </span>
                                        </div>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                               aria-label="Name" aria-describedby="Name" value="{{ old('name') }}"
                                               required autocomplete="name" autofocus
                                               data-msg="Please enter a valid name."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->
                            <!-- Form Group -->
                            <div class="form-group">
                                <div class="js-form-message js-focus-state">
                                    <label class="sr-only" for="signupEmail">{{ __('Email') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="signupEmailLabel">
                                                    <span class="fas fa-user"></span>
                                                </span>
                                        </div>
                                        <input type="email" name="email" class="form-control" id="signupEmail"
                                               placeholder="Email" aria-label="Email"
                                               aria-describedby="signupEmailLabel" value="{{ old('email') }}" required
                                               autocomplete="email"
                                               data-msg="Please enter a valid email address."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->
                            <div class="form-group">
                                <div class="js-form-message js-focus-state">
                                    <label class="sr-only" for="signupPassword">{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="signupPasswordLabel">
                                                    <span class="fas fa-lock"></span>
                                                </span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="signupPassword"
                                               placeholder="Password" aria-label="Password"
                                               aria-describedby="signupPasswordLabel" required
                                               autocomplete="new-password"
                                               data-msg="Your password is invalid. Please try again."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <div class="js-form-message js-focus-state">
                                    <label class="sr-only"
                                           for="signupConfirmPassword">{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="signupConfirmPasswordLabel">
                                                <span class="fas fa-key"></span>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               id="signupConfirmPassword" placeholder="Confirm Password"
                                               aria-label="Confirm Password"
                                               aria-describedby="signupConfirmPasswordLabel" required
                                               autocomplete="new-password"
                                               data-msg="Password does not match the confirm password."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->
                            <!-- End Form Group -->
                            <p class="text-gray-90 mb-4">Your personal data will be used to support your experience
                                throughout this website, to manage your account, and for other purposes described in our
                                <a
                                    href="#" class="text-blue">privacy policy.</a></p>
                            <!-- Button -->
                            <div class="mb-6">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Register</button>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                    </div>
                @else
                    <div class="col-lg-6">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Profile</h3>
                        </div>

                        <!-- End Title -->
                        <form class="js-validate" novalidate="novalidate" action="{{ route('profile.update') }}"
                              method="POST">
                        @csrf
                        <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="name">Name
                                </label>
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                       value="{{ auth()->user()->name }}">
                            </div>

                            <div class="js-form-message form-group">
                                <label class="form-label" for="email">Email address
                                </label>
                                <input type="email" class="form-control" name="email" placeholder="Email address"
                                       value="{{ auth()->user()->email }}">
                            </div>
                            <!-- End Form Group -->
                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Update
                                        Profile
                                    </button>
                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                        <hr>
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Change Password</h3>
                        </div>
                        <form class="js-validate" novalidate="novalidate" action="{{ route('change.password') }}"
                              method="POST">
                        @csrf
                        <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Current Password </label>
                                <input type="password" class="form-control" name="password"
                                       id="signinSrPasswordExample2" placeholder="Password" aria-label="Password"
                                       required data-msg="Your password is invalid. Please try again."
                                       data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">New Password </label>
                                <input type="password" class="form-control" name="new-password"
                                       id="signinSrPasswordExample2" placeholder="New Password" aria-label="Password"
                                       required data-msg="Your password is invalid. Please try again."
                                       data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Confirm Password </label>
                                <input type="password" class="form-control" name="new-password-confirmed"
                                       id="signinSrPasswordExample2" placeholder="Confirm Password"
                                       aria-label="Confirm Password" required
                                       data-msg="Your password is invalid. Please try again."
                                       data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Form Group -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Updated
                                        Password
                                    </button>
                                </div>
                            </div>
                            <!-- End Button -->

                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
@endsection
