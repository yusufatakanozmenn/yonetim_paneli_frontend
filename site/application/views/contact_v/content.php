<div class="page-content custom-img-background dark page-title page-title-7 mb-100">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 centered">
                <div class="custom-heading style-1 triggerAnimation animated" data-animate='fadeInUp'>
                    <h1><span>İletisim</span></h1>
                    <!-- <h1>Send us a message</h1> -->
                </div><!-- .custom-heading.style-1 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<!-- .page-content start -->
<div class="page-content">
    <!-- .container start -->
    <div class="container">
        <!-- .row start -->
        <div class="row mb-0">
            <div class="col-md-12 mb-20 centered triggerAnimation animated" data-animate='fadeIn'>
                <div class="custom-heading style-1">
                    <h3>BUGÜN BİZE ULAŞIN</h3>
                    <!-- .divider.style-1 start -->
                    <div class="divider style-1 center">
                        <span class="hr-simple left"></span>
                        <i class="fa fa-circle hr-icon"></i>
                        <span class="hr-simple right"></span>
                    </div>
                </div><!-- .custom-heading.style-1 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->

        <!-- .row start -->
        <div class="row">
            <div class="col-md-8 centered">
                <p class="emphasized-text">İletisim: <span><?php echo $contacts->firma_telefon; ?></span></p>
                <!-- form start -->
                <form class="wpcf7">
                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="text" class="wpcf7-text" id="contact-name" placeholder="Your name...">
                        </span>
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="email" class="wpcf7-text" id="contact-email"
                                placeholder="Email...">
                        </span>
                    </fieldset>

                    <fieldset>
                        <span class="wpcf7-form-control-wrap your-message">
                            <textarea rows="8" class="wpcf7-textarea" id="contact-message"
                                placeholder="Message..."></textarea>
                        </span>
                    </fieldset>
                    <input type="submit" class="wpcf7-submit btn btn-big black btn-centered" value="Gönder">
                </form><!-- .wpcf7 end -->
            </div><!-- .col-md-8 end -->
         
            <div class="col-md-4 col-sm-4">
                <div class="custom-heading style-2">
                    <h4><?php echo $contacts->firma_adi; ?></h4>
                    <div class="divider style-1">
                    <span class="hr-simple left"></span>
                        <i class="fa fa-circle hr-icon left"></i>
                        <span class="hr-simple right"></span>
                    </div>
                </div><!-- .custom-heading.style-2 end -->

                <ul>
                    <li><?php echo $contacts->firma_adres; ?></li>
                </ul>
                <h5>Çalıma Saatleri:</h5>
                <ul>
                    <li>Hafta İçi: 09:00  - 18:00 </li>
                    <li>Hafta Sonu 10:00  - 17:30 </li>
                </ul>
                <h5>İletişim:</h5>
                <ul>
                    <li><?php echo $contacts->firma_telefon; ?></li>
                    <li><?php echo $contacts->firma_email; ?></li>
                </ul>
                

            </div><!-- .col-md-4 end -->
     
        </div><!-- .row end -->
       
    </div><!-- .container end -->
</div><!-- .page-content end -->