<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blood Bank</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
        <!-- Load css styles -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logoweb.png">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
        <style type="text/css">
            .help-block{
                font-size: 12px;
            }
        </style>
    </head>
    
    <body>
        <!-- navbar start -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="<?php echo base_url(); ?>assets/images/logoweb.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <nav class="navnavnav">
                            <ul class="nav" id="top-navigation">
                            <li class="active"><a href="<?php echo site_url('bloodbank/index'); ?>">Home</a></li>
                        </ul>
                        </nav>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- navbar end -->

        <!-- login regist start -->
        <div class="cotn_principal">
            <div class="cont_centrar">
                <div class="cont_login">
                    <div class="cont_info_log_sign_up">
                        <div class="col_md_login">
                            <div class="cont_ba_opcitiy">
                                <h2>LOGIN</h2>  
                                <p>Join us now and help others.</p> 
                                <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                            </div>
                        </div>

                        <div class="col_md_sign_up">
                            <div class="cont_ba_opcitiy">
                                <h2>SIGN UP</h2>
                                <p>Welcome back hero.</p>
                                <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                            </div>
                        </div>
                    </div>

                    <div class="cont_back_info">
                        <div class="cont_img_back_grey">
                            <img src="https://images.unsplash.com/photo-1494832944834-a08818c634b0?auto=format&fit=crop&w=889&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" alt="" />
                        </div>
                    </div>

                    <div class="cont_forms" >
                        <div class="cont_img_back_">
                            <img src="https://images.unsplash.com/photo-1494832944834-a08818c634b0?auto=format&fit=crop&w=889&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" alt="" />
                        </div>
                        <div class="cont_form_login">
                            <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">×</i></a>
                            <h2>LOGIN</h2>
                            <form method="post" action="<?php echo site_url ('login/aksi_login'); ?>" id="form_log">
                                <input type="text" placeholder="Username" name="username" required="" />
                                <input type="password" placeholder="Password" name="password" />
                                <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                            </form>
                        </div>

                        <div class="cont_form_sign_up">
                            <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">×</i></a>
                            <h2>SIGN UP</h2>
                            <form method="post" action="<?php echo site_url ('login/registrasi'); ?>" id="form_sign">
                                <input type="text" placeholder="Email" name="email" required="" value="<?php echo !empty($data['email'])?$data['email']:''; ?>" />
                                <?php echo form_error('email','<span class="help-block">','</span>'); ?>
                                <input type="text" placeholder="User" name="username" required="" value="<?php echo !empty($data['username'])?$data['username']:''; ?>" />
                                <input type="password" placeholder="Password" name="password" required="" />
                                <?php echo form_error('password','<span class="help-block">','</span>'); ?>
                                <input type="password" placeholder="Confirm Password" name="cpassword" required="" />
                                <?php echo form_error('cpassword','<span class="help-block">','</span>'); ?>
                                <button class="btn_sign_up" onclick="cambiar_sign_up()" type="submit" name="regist">SIGN UP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login regist start -->

        <!-- Include javascript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.inview.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/LOGIN.js"></script>
    </body>
</html>