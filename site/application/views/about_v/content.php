<!-- .page-content start -->
<div class="page-content custom-img-background dark page-title page-title-1 mb-100">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 centered">
                <div class="custom-heading style-1 triggerAnimation animated" data-animate='fadeInUp'>
                    <h1><span><?php echo $abouts->adi; ?></span></h1>
                </div><!-- .custom-heading.style-1 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<!-- .page-content start -->
<div class="page-content">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-6 start -->
            
            <div class="col-md-6 col-sm-6">
                <?php 

                $image=get_about_cover_image($abouts->id);
                $image = ($image) ? $upload_path."page_management_v/$image":base_url("/img/pics/img-04.jpg");
                ?>

                <img src="<?php echo $image;?>" alt="Royal Plate - Restaurant & Catering HTML Template" />
            </div><!-- .col-md-6 end -->
            <!-- .col-md-6 start -->
            <div class="col-md-6 col-sm-6 centered">
                <div class="custom-heading style-1">
                    <h3>Since 1975</h3>

                    <!-- .divider.style-1 start -->
                    <div class="divider style-1 center">
                        <span class="hr-simple left"></span>
                        <i class="fa fa-circle hr-icon"></i>
                        <span class="hr-simple right"></span>
                    </div>
                </div><!-- .custom-heading.style-1 end -->

                <!-- <div class="blockquote style-1 triggerAnimation animated" data-animate='fadeIn'>
                    <p>"There is no sincerer love than the love of food"</p>
                    <span class="author">- George Bernard Shaw</span>
                </div> -->

                <p><?php echo $abouts->aciklama; ?></p>

            </div><!-- .col-md-6 end -->
           

        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->