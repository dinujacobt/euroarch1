<!DOCTYPE HTML>
<html>
    <head>
        <title>Euroarch</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= theme ?>images/eurof.png" />
        <link href="<?= theme ?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= theme ?>css/bootstrap.css" rel='stylesheet' type='text/css'/>
        <link href="<?= theme ?>css/euro.css" rel='stylesheet' type='text/css'/>
        <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'/>
       
    </head>
    <body>
        <div class="strip">
            <div class="container">
                <a href="tel:+91484 4035173"><i class="fa fa-phone" ></i>+91484 4035173</a>
                <a  href="mailto:info@euroarch.com"><i   class="fa fa-envelope-o" ></i>info@euroarch.com</a>

                <?php
                if (!isset($this->session->userdata['user_id'])) {
                    ?>
                    <a href="<?= base_url() ?>login">
                        <span><i class="fa fa-sign-in" ></i>LOGIN</span>
                    </a>
                    <?php
                } else {
                    
                    ?>
                    <a href="<?= base_url() ?>admin">
                        
                        <span><i class="fa fa-product-hunt" ></i>Products</span>
                    </a>
                    <a href="<?= base_url() ?>profile">
                        <span><i class="fa fa-user" ></i>Profile</span>
                    </a>
                    <a href="<?= base_url() ?>login/logout">
                        <span><i class="fa fa-sign-out" ></i>LOGOUT</span>
                    </a>
                    <?php
                }
                ?>

            </div>
        </div>
        <div class="logostrip">
            <div class="container">
                <div class="logo">EUROARCH</div>
                <ul class="navi">
                    <li><a href="<?= base_url() ?>">HOME</a></li>
                    <!--<li><a href="<?= base_url() ?>about">ABOUT</a></li>-->
                    <li><a href="<?= base_url() ?>products">PRODUCTS</a></li>
                    <li><a href="<?= base_url() ?>contact">CONTACT</a></li>
                </ul>
            </div>
        </div>