@include ('inc.header');
		<main class=mdl-layout__content>
			<div class="loginmain">
				<div class="loginCard">
					<div class="login-btn splits">
						<p>Already a user?</p>
						<button>Login</button>
					</div>
					<div class="rgstr-btn splits">
						<p>Don't have an account?</p>
						<button class="active">Register</button>
					</div>
					<div class="wrapper">
						<form id="login" tabindex="500">
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
								<a href="signup.html" class="login100-social-item bg-fb">
									<i class="fab fa-facebook-f"></i>
								</a>
								<a href="signup.html" class="login100-social-item bg-twitter">
									<i class="fab fa-twitter"></i>
								</a>
								<a href="signup.html" class="login100-social-item bg-google">
									<i class="fab fa-google"></i>
								</a>
							</div>
						</form>
						<form id="register" tabindex="502">
							<h3>Register</h3>
							<div class="name">
								<input type="text">
								<label>Fullname</label>
							</div>
							<div class="mail">
								<input type="email">
								<label>Email</label>
							</div>
							<div class="uid">
								<input type="text">
								<label>Username</label>
							</div>
							<div class="passwd">
								<input type="password">
								<label>Password</label>
							</div>
							<div class="submit">
								<button class="dark">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
@include ('inc.footer');
