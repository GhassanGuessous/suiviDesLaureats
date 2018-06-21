<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/auth.all.dependency/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/auth.all.dependency/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/auth.all.dependency/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/auth.all.dependency/css/main.css">
<!--===============================================================================================-->

	
	<section id="auth">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="assets/auth.all.dependency/images/img-01.png" alt="IMG">
					</div>

					<form class="login100-form validate-form" action="authentification" method="POST">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<span class="login100-form-title">
							Authentification
						</span>

						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	

	
<!--===============================================================================================-->	
	<script src="assets/auth.all.dependency/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/auth.all.dependency/vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
	<script src="assets/auth.all.dependency/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/auth.all.dependency/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/auth.all.dependency/js/main.js"></script>