<!doctype html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/data.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/data.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(<?php echo base_url() ?>assets/login/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form class="signin-form" method="POST" action="<?php echo base_url() ?>login/verif_pengurus">
                            <div class="form-group">
                                <input type="text" id="nik" class="form-control" name="nik" placeholder="Masukkan NIK" required>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn  btn-login btn-primary submit px-3">Sign In</button>
                            </div>
                        </form>
                        <div class="text-center p-t-136">
                            <a class="txt2" href="<?php echo base_url() ?>login">
                                Login sebagai Warga
                                <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div style="color: red;margin-bottom: 15px;"> <?php
                                                                    // Cek apakah terdapat session nama message    
                                                                    if ($this->session->flashdata('message')) {
                                                                        // Jika ada      
                                                                        echo $this->session->flashdata('message');
                                                                        // Tampilkan pesannya    
                                                                    }

                                                                    ?> </div>
                </div>
            </div>
    </section>

    <script src="<?php echo base_url() ?>assets/login/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/login/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/login/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/login/js/main.js"></script>


</body>

</html>