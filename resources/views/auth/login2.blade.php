<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login - Layout 5 | Canvas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('images/login_bg.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container-fluid vertical-middle divcenter clearfix">

						<div class="center">
							<a href="index.html"><img src="images/logo-dark.png" alt="Canvas Logo"></a>
						</div>

						<div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
							<div class="card-body" style="padding: 40px;">
								 <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
									<h3>登入頁面</h3>

									<div class="col_full">
										<label for="username">帳號:</label>
										<input type="text" id="name" name="name" value="" class="form-control not-dark" />
									</div>

									<div class="col_full">
										<label for="password">密碼:</label>
										<input type="password" id="password" name="password" value="" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="submit" name="submit" value="login">登入</button>
                                        <a href="{{ route('password.request') }}" class="fright">忘記密碼?</a>
                                        
                                    </div>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                </div>
								</form>

								<div class="line line-sm"></div>

								<div class="center">
									<h4 style="margin-bottom: 15px;">社群帳號登入:</h4>
									<a href="{{url('login/facebook')}}" class="button button-rounded si-facebook si-colored">Facebook</a>
									<span class="d-none d-md-block">or</span>
									<a href="{{url('login/google')}}" class="button button-rounded si-twitter si-colored">Google+</a>
								</div>
							</div>
						</div>

						<div class="center dark"><small>Copyrights &copy; All Rights Reserved by Goblin Lab Studio.</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>