<?php require_once BASEURL . '/views/shared/header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card auth-card p-4 shadow-lg border-0">
                <div class="card-body">
                    <h3 class="text-center fw-bold mb-4 text-ocean">🌊 Welcome Back</h3>
                    <p class="text-center text-muted small mb-4">Login to manage your surf sessions.</p>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger error-banner py-2 text-center mb-4">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo URLROOT; ?>/../index.php?url=AuthController/login" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required autofocus>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary fw-bold py-2 shadow-sm">Sign In</button>
                        </div>
                    </form>
                    
                    <hr class="my-4 text-muted opacity-25">
                    
                    <div class="text-center">
                        <p class="small text-muted mb-0">New to the school? 
                            <a href="<?php echo URLROOT; ?>/../index.php?url=AuthController/register" class="text-ocean fw-bold text-decoration-none">Create an account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once BASEURL . '/views/shared/footer.php'; ?>
