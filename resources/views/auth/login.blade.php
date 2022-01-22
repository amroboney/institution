@extends('layouts.login_app')

@section('content')
<div class="title_header">
        تسجيل الدخول
    </div><!--end of tite header-->
<div class="container">
    

    <div class="row">
        <div class="logo" >
            <img src="img/logo.png" width="200" height="200" center />
        </div>
    </div>
    <div class="row" dir="ltr">
        <div class="col-md-8 col-md-offset-2">
            <div class="login_form_container">
                <div id="login_messages">رجاءً! قم بتسجيل الدخول هنا</div>
                
                
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="input_container{{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="login_logo"><img src="img/login.png"/></span>
                            <input class="login_input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input_container{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="password_logo"><img src="img/password.png"/></span>
                            <input class="login_input" id="password" type="password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>


                        <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group" dir="rtl">
                            <div >
                                <button type="submit" class="login_btn">
                                    تسجيل الدخول
                                </button>

                                <!-- <a style="color:white"class="btn btn-link" href="{{ route('password.request') }}">
                                    هل نسيت كلمة السر ؟
                                </a> -->
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
