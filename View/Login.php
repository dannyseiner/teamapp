<div class="container form-spacer" id="container">
	<div class="form-container sign-up-container">
		<form method=POST>
			<h1>Create Account</h1>
			<input type="text" placeholder="Name" name='username' />
			<input type="email" placeholder="Email" name='email'/>
			<input type="password" placeholder="Password" name='password'/>
			<button type='submit' name='register'>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method=POST>
			<h1>Sign in</h1>
			<input type="email" placeholder="Email" name='remail' />
			<input type="password" placeholder="Password" name='rpassword'/>
			<a href="#">Forgot your password?</a>
			<button type='submit' name='login'>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Do you already have account?</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Still don't have account?? U good bro?!?</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


