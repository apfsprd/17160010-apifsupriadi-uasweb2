<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="<?= base_url('assets/'); ?>images/logo-dark.png" alt="" class="img-fluid mb-4">
            <h4 class="mb-3 f-w-400">Signin</h4>
            
            <?= $this->session->flashdata('message'); ?>
            <form class="user" method="post" action="<?= base_url('auth'); ?>">
						<div class="form-group mb-3">
							<label class="floating-label" for="Email">Email address</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="">
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="Password">Password</label>
              <input type="password" class="form-control" id="Password" name="password" placeholder="">
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="custom-control custom-checkbox text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Save credentials.</label>
						</div>
            <button type="submit" class="btn btn-block btn-primary mb-4">Signin</button>
            </form>

						<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
						<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->