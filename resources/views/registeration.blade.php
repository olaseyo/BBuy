
<body class="background">
<div class="fixed-background"></div>
<main>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-10 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="position-relative image-side">
                        <p class="text-white h2">Merchant Registration</p>
                        <p class="white mb-0">
                            Please use this form to register.
                            <br>If you are a member, please
                            <a href="/" class="white">login</a>.
                        </p>
                    </div>
                    {{Auth::user()}}
                    <div class="form-side">
                        <a href="#">
                            <h3>Biller Merchant Logo here</h3>
                        </a>
                        <h6 class="mb-4">Register</h6>
                        @include('inc.messages')
            <form name="form" method="POST" action="{{ url('/registerMerchant') }}" >
                        @csrf
                    <label class="form-group has-float-label mb-4">
                        <input class="form-control" type="email" name="email">
                        <span>Email</span>
                    </label>
                    <label class="form-group has-float-label mb-4">
                        <input class="form-control sty1" type="password" name="password">
                        <span>Password</span>
                    </label>
                    <label class="form-group has-float-label mb-4">
                        <input class="form-control sty1" type="password" name="password_confirmation">
                        <span>Confirm Password</span>
                    </label>
                    <div class="d-flex justify-content-end align-items-center">
                   <button class="btn btn-primary btn-lg btn-shadow" type="submit">REGISTER</button>
                    </div>
                        <p>Already have an account? <a href="/" class="text-right">Login here</a></p>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/vendor/jquery-3.3.1.min.js"></script>
<script src="js/vendor/bootstrap.bundle.min.js"></script>
<script src="js/dore.script.js"></script>
<script src="js/scripts.js"></script>

</body>
