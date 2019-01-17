<!DOCTYPE html>
<html lang>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BestBuy - Signin</title>
  <link href="admin/assets/css/app.min.css" rel="stylesheet">
  <link href="admin/assets/css/style.css" rel="stylesheet">
  <link href="admin/assets/css/pages/extra_pages.css" rel="stylesheet">
</head>
<body class="login-page">
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
          @include('../inc.messages')
				<form class="login100-form validate-form" method="post" action="{{url('/Login')}}">
            @csrf
					<span class="login100-form-logo">
						<img alt="" src="admin/assets/images/loading.png">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="email" placeholder="Username">
						<i class="material-icons focus-input1001">person</i>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<i class="material-icons focus-input1001">lock</i>
					</div>
					<div class="contact100-form-checkbox">
						<div class="form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" value=""> Remember me
								<span class="form-check-sign">
									<span class="check"></span>
								</span>
							</label>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

          <div class="flex-c p-b-112">
						<a href="#" class="login100-social-item bg-fb">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="login100-social-item bg-twitter">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="login100-social-item bg-google">
							<i class="fab fa-google"></i>
						</a>
					</div>
          
					<div class="text-center p-t-50">
						<a class="txt1" href="reset.html">
							Forgot Password?
						</a>
					</div>

          <div class="text-center p-t-50">
						<a class="txt1" href="{{url('/signup')}}">
						Dont have an account yet ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="admin/assets/js/app.min.js"></script>
	<script src="admin/assets/js/pages/examples/pages.js"></script>
</body>
</html>
