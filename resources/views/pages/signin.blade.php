<!DOCTYPE html>
<html lang>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BestBuy - Welcome</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,500italic,700,900" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.min.css" title="main">

  <link href="admin/assets/css/app.min.css" rel="stylesheet">
	<link href="admin/assets/css/style.css" rel="stylesheet">
	<link href="admin/assets/css/pages/extra_pages.css" rel="stylesheet">
	<style>
		header {
			height: auto;
		}
	</style>
</head>
<body class="light">
  <!--[if lt IE 10]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <a class="mdl-layout-title" href="index.html">
          <img src="assets/images/logo.png" alt="BestBuy">
				</a>
			</div>
		</header>

		<main class=mdl-layout__content>
			<div class="loginmain">
				<div class="loginCard">
					<div class="login-btn splits">
						<p>Already a user?</p>
						<button class="active">Login</button>
					</div>
					<div class="rgstr-btn splits">
						<p>Don't have an account?</p>
						<button>Register</button>
					</div>
					<div class="wrapper">
						<form id="login" tabindex="500" action="{{url('/registerMerchant')}}">
                @csrf
                @include('../inc.messages')
							<h3>Login</h3>

							<div class="mail">
								<input type="email">
								<label>Email or Username</label>
							</div>
							<div class="passwd">
								<input type="password">
								<label>Password</label>
							</div>
							<div class="text-right p-t-8 p-b-31">
								<a href="reset.html">
									Forgot password?
								</a>
							</div>
							<div class="submit">
								<button class="dark">Login</button>
							</div>
							<div class="flex-c p-b-112">
								<a href="signin.html" class="login100-social-item bg-fb">
									<i class="fab fa-facebook-f"></i>
								</a>
								<a href="signin.html" class="login100-social-item bg-twitter">
									<i class="fab fa-twitter"></i>
								</a>
								<a href="signin.html" class="login100-social-item bg-google">
									<i class="fab fa-google"></i>
								</a>
							</div>
						</form>
            <form id="register" method="post" tabindex="500" action="{{url('/registerMerchant')}}">
                @csrf
							<h3>Register</h3>
							<div class="name">
								<input type="text" name="name">
								<label>Fullname</label>
							</div>
							<div class="mail">
								<input type="email" name="email">
								<label>Email</label>
							</div>
							<div class="uid">
								<input type="text" name="phone_number">
								<label>Phone Number</label>
							</div>

              <div class="utype">
                <select type="text" name="utype">
                  <option value="2">Merchant</option>
                  <option value="3">User</option>
                </select>
                <label>User Type</label>
              </div>

							<div class="passwd">
								<input type="password">
								<label>Password</label>
							</div>
							<div class="submit">
								<button type="submit" class="dark">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
  <script src="admin/assets/js/app.min.js"></script>
	<script src="admin/assets/js/pages/examples/login-register.js"></script>
  <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='https://www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
  </script>
  <script src="assets/js/theme.min.js"></script>
</body>
</html>
