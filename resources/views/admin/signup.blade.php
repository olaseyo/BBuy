<!DOCTYPE html>
<html lang>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BestBuy - Signup</title>
  <link href="admin/assets/css/app.min.css" rel="stylesheet">
  <link href="admin/assets/css/style.css" rel="stylesheet">
  <link href="admin/assets/css/pages/extra_pages.css" rel="stylesheet">
</head>
<body class="login-page">
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
        @include('../inc.messages')
        <form id="register" method="post" tabindex="500" class="login100-form validate-form" action="{{url('/registerMerchant')}}">
            @csrf
					<span class="login100-form-logo">
						<img alt="" src="admin/assets/images/loading.png">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Registration
					</span>
					<div class="row">
						<div class="col-lg-6 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter fullname">
								<input class="input100" type="text" name="name" placeholder="Fullname">
								<i class="material-icons focus-input1001">person</i>
							</div>
						</div>

            <div class="col-lg-6 p-t-20">
              <div class="select-dropdown dropdown-trigger" data-validate="Enter phone number">
                <input class="input100" type="text" name="phone_number" placeholder="Phone">
                <i class="material-icons focus-input1001">phone</i>
              </div>
            </div>
            <div class="col-lg-12 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter email">
								<input class="input100" type="email" name="email" placeholder="Email">
								<i class="material-icons focus-input1001">email</i>
							</div>
						</div>

						<div class="col-lg-12 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter password">
								<input class="input100" type="password" name="password_confirmation" placeholder="Password">
								<i class="material-icons focus-input1001">lock_outline</i>
							</div>
						</div>
						<div class="col-lg-12 p-t-20">
							<div class="wrap-input100 validate-input" data-validate="Enter password again">
								<input class="input100" type="password" name="password" placeholder="Confirm password">
								<i class="material-icons focus-input1001">lock_outline</i>
							</div>
						</div>
					</div>

          <div class="contact100-form-checkbox">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="utype" value="2">Signup as merchant
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign Up
						</button>
					</div>
					<div class="text-center p-t-50">
						<a class="txt1" href="{{url('/signin')}}">
							You already have a membership?
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
