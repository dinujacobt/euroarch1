<?php $this->load->view('header') ?>
<div class="cont">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.5095698571877!2d76.29463071434243!3d9.974699292868504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d352672520b%3A0xe5ebd09e8f4bcfe9!2sEuro-Arch+Systems+%26+Solutions+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1509478145306" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="form">
        <div class="container">
            <div class="col-md-6">
                <form action="<?= base_url()?>contact/send_mail">
                    <h2>SENT MAIL</h2>
                    <input type="text" placeholder="Name" name="name">
                    <input type="text" placeholder="Email" name="email">
                    <input type="text" placeholder="Phone no" name="pno">
                    <textarea name="message" placeholder=" Your Message"></textarea>
                    <input type="submit" value="Send Message">
                </form>
            </div>
            <div class="col-md-6">
                <div class="cinfo">
                    <h2>CONTACT INFO</h2>
                    <br>
                    <i class="fa fa-map-o"></i>Colony,Cochin-17,<br>Kerela,India-682017.<br>
                    <i class="fa fa-phone"></i>+91484 4035173<br>
                    <i class="fa fa-envelope"></i>info@euroarch.com
                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('footer')?>