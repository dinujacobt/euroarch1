<?php $this->load->view('header') ?>
<div class="cont">
    <div id="googleMap" style="width:100%;height:500px;"></div>

    <script>
        function initialize()
        {
            var mapProp = {
                center: new google.maps.LatLng(51.508742, -0.120850),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div class="form">
        <div class="container">
            <div class="col-md-6">
                <form>
                    <h2>SENT MAIL</h2>
                    <input type="text" id="name" placeholder="Name" name="name">
                    <input type="text" id="email" placeholder="Email" name="email">
                    <input type="text" id="pno" placeholder="Phone no" name="pno">
                    <textarea name="message" id="message" placeholder=" Your Message"></textarea>
                    <input type="submit" value="Send Message">
                </form>
            </div>
            <div class="col-md-6">
                <div class="cinfo">
                    <h2>CONTACT INFO</h2>
                    <br>
                    <i class="ion-android-location" style="font-size:40px;"></i>&nbsp&nbsp&nbspPlackattu Colony,Cochin-17,<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspKerela,India-682017.<br>
                    <i class="ion-ios7-telephone" style="font-size:40px;"></i>&nbsp&nbsp&nbsp+91484 4035173<br>
                    <i class="ion-email" style="font-size:40px;"></i>&nbsp&nbsp&nbspinfo@euroarch.com
                </div>
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('footer')?>