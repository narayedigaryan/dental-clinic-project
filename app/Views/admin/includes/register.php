
    <div class="container">
        <h1> <?=$title ?? '';?></h1>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <?= get_csrf_field();?>
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fname" class="form-control form-control-user <?=get_validation_class('fname');?>" id="fname"
                                            placeholder="First Name" value="<?= old('fname');?>">
                                        <?=get_errors('fname'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control form-control-user <?=get_validation_class('lname');?>" id="lname"
                                            placeholder="Last Name" value="<?= old('lname');?>">
                                        <?=get_errors('lname'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user <?=get_validation_class('email');?>" id="email"
                                        placeholder="Email Address" value="<?= old('email');?>">
                                    <?=get_errors('email'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user <?=get_validation_class('password');?>"
                                            id="password" placeholder="Password">
                                        <?=get_errors('password'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repeatpassword" class="form-control form-control-user <?=get_validation_class('repeatpassword');?>"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                        <?=get_errors('repeatpassword'); ?>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                            </form>
                            <?php
                            session()->remove('form_data');
                            session()->remove('form_errors');
                            ?>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="<?=base_url('/login')?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
