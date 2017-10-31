<!DOCTYPE HTML>
<html>
    <head>
        <title>Euroarch</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= theme ?>css/bootstrap.css" rel='stylesheet' type='text/css'/>
        <link href="<?= theme ?>css/ionicons.css" rel='stylesheet' type='text/css'/>
        <link href="<?= theme ?>css/euro.css" rel='stylesheet' type='text/css'/>

    </head>
    <body>
        <div class="strip">
            <div class="container">
                <i class="ion-ios7-telephone-outline" style="font-size:25px;color:#cdcdcd;"></i>&nbsp&nbsp&nbsp9497351861&nbsp&nbsp&nbsp
                <a style="color:#cdcdcd;text-decoration: none;" href="mailto:info@euroarch.com"><i style="font-size:25px;color:#cdcdcd;" class="ion-ios7-email-outline" ></i>&nbsp&nbsp&nbspinfo@euroarch.com</a>

                <?php
                if (!isset($this->session->userdata['user_id'])) {
                    ?>
                    <a href="<?= base_url() ?>login">
                        <span><i class="ion-ios7-person-outline" style="font-size:25px;color:#cdcdcd;"></i>LOGIN</span>
                    </a>
                    <?php
                } else {
                    
                    ?>
                    <a href="<?= base_url() ?>admin">
                        <span><i class="ion-ios7-person-outline" style="font-size:25px;color:#cdcdcd;"></i>Products</span>
                    </a>
                    <a href="<?= base_url() ?>profile">
                        <span><i class="ion-ios7-person-outline" style="font-size:25px;color:#cdcdcd;"></i>Profile</span>
                    </a>
                    <a href="<?= base_url() ?>login/logout">
                        <span><i class="ion-ios7-person-outline" style="font-size:25px;color:#cdcdcd;"></i>LOGOUT</span>
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
                    <li><a href="<?= base_url() ?>about">ABOUT</a></li>
                    <li><a href="<?= base_url() ?>products">PRODUCTS</a></li>
                    <li><a href="<?= base_url() ?>contact">CONTACT</a></li>
                </ul>
            </div>
        </div>