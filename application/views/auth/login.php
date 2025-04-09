<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
	<div class="card p-4 shadow-lg rounded" style="width: 100%; max-width: 400px;">
		<h3 class="text-center mb-4 text-primary">Login Account</h3>
		<form method="post" action="<?= base_url('/auth/login_user') ?>">
			<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<div class="input-group">
                    <span class="input-group-text bg-primary text-white">
                        <i class="bi bi-person"></i>
                    </span>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
				</div>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<div class="input-group">
                    <span class="input-group-text bg-primary text-white">
                        <i class="bi bi-lock"></i>
                    </span>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
				</div>
			</div>
			<button type="submit" class="btn btn-primary w-100 py-2">
				<i class="bi bi-box-arrow-in-right me-2"></i>Register
			</button>
			<p class="text-center mt-3">
				Don't have an account? <a href=<?= base_url('/auth/register') ?> class="text-primary">Register here</a>
			</p>
		</form>
	</div>
</div>
