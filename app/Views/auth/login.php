<?= $this->extend('auth/template'); ?>

<?= $this->Section('content'); ?>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                            <!-- pesan alert -->
                            <?= view('Myth\Auth\Views\_message_block') ?>

                            <form action="<?= url_to('login') ?>" method="post">
                                <?= csrf_field() ?>

                                <?php if ($config->validFields === ['email']) : ?>
                                    <div class="form-floating mb-3"> 
                                        <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="inputEmail" type="email" name="login" placeholder="<?= lang('Auth.email') ?>" /> 
                                        <label for="inputEmail"><?= lang('Auth.email') ?></label>

                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="form-floating mb-3">
                                        <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="inputEmail" type="text" name="login" placeholder="<?= lang('Auth.emailorUsername') ?>" />
                                        <label for="inputEmail"><?= lang('Auth.emailOrUsername') ?></label>

                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="form-floating mb-3">
                                    <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="inputPassword" type="password" name="password" placeholder="<?= Lang('Auth.password') ?>" /> 
                                    <label for="inputPassword"><?= Lang('Auth.password') ?></label>

                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>

                                <?php if ($config->allowRemembering) : ?> 
                                    <div class="form-check mb-3">
                                        <input class="form-check-input <?php if (old('remember')) : ?>checked<?php endif ?>" id="inputRemember Password" type="checkbox" name="remember"/>
                                        <label class="form-check-label" for="inputRemember Password"><?= Lang('Auth.rememberMe') ?></label>
                                    </div>
                                <?php endif; ?>

                                <div class="d-flex align-items-center justify-content-between mt-4 mb-8">
                                    <a class="small" href="<?= url_to('forgot') ?>">Reset Password</a> 
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    

    <?= $this->endSection('content'); ?>

        
        
   

