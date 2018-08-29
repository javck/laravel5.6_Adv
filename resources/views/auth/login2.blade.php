@extends('layouts.site')

@section('content')
<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('images/parallax/home/1.jpg') center center no-repeat; background-size: cover;"></div>

<div class="section nobg full-screen nopadding nomargin">
    <div class="container-fluid vertical-middle divcenter clearfix">

        <div class="center">
            <a href="index.html"><img src="images/logo-dark.png" alt="Canvas Logo"></a>
        </div>

        <div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
            <div class="card-body" style="padding: 40px;">
                <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                    <h3>Login to your Account</h3>

                    <div class="col_full">
                        <label for="login-form-username">Username:</label>
                        <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control not-dark" />
                    </div>

                    <div class="col_full">
                        <label for="login-form-password">Password:</label>
                        <input type="password" id="login-form-password" name="login-form-password" value="" class="form-control not-dark" />
                    </div>

                    <div class="col_full nobottommargin">
                        <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                        <a href="#" class="fright">Forgot Password?</a>
                    </div>
                </form>

                <div class="line line-sm"></div>

                <div class="center">
                    <h4 style="margin-bottom: 15px;">or Login with:</h4>
                    <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                    <span class="d-none d-md-block">or</span>
                    <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
                </div>
            </div>
        </div>

        <div class="center dark"><small>Copyrights &copy; All Rights Reserved by Canvas Inc.</small></div>

    </div>
</div>
@endsection