<!-- <body class="img js-fullheight" style="background-image: url(assets/images/bcg2.jpg); height:auto;"> -->

<body class="img js-fullheight" style="background-image: url(<?php base_url(); ?>assets/images/bcg2.jpg); height:auto;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-3 text-center mb-5">
                    <img class="logologin" src="<?php echo base_url(); ?>assets/images/logo/infly-logo.png">
                    <?php echo $this->session->flashdata('pesan'); ?>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form method="POST" action="<?php echo base_url('Welcome'); ?>" class="signin-form">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" />
                                <?php echo form_error('email', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" />
                                <span toggle="#password-field" class="toggle-password"></span>
                                <?php echo form_error('password', '<div class="text-small text-danger"></div>') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>