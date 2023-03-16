<div class="page-content custom-img-background dark bkg-img15 custom-col-padding mb-100">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 centered">
                <div class="custom-heading style-1 triggerAnimation animated" data-animate='fadeInUp'>
                    <h2><span>ÜRÜNLER</span></h2>
                    <!-- .divider.style-2 start -->
                    <div class="divider style-2 center">
                        <span class="hr-double left"></span>
                        <span class="divider-svg">
                            <img src="<?php echo base_url("assets");?>/img/svg/favicon.png" alt="Royal Plate Restaurant & Catering HTML Template">
                        </span>
                        <span class="hr-double right"></span>
                    </div>
                </div><!-- .custom-heading.style-1 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
<div class="page-content">
    <!-- .container start -->
    <div class="container">
        <!-- .row start -->
        
        <div class="row mb-20">
        <?php foreach ($products as $product) { ?>

            <div class="col-md-4 col-sm-4 menu-package">
                <div class="menu-sample style-1 border-decor centered">
                    <figure>
                        <div class="menu-image">
                            <img src="<?php echo base_url("assets");?>/img/pics/img-13.jpg"
                                alt="Royal Plate - Restaurant & Catering HTML Template" />
                        </div>
                        <figcaption>
                            <div class="custom-heading style-1">
                                <h4><?php echo character_limiter(strip_tags($product->adi),10);?></h4>
                                <!-- .divider.style-1 start -->
                                <div class="divider style-1 center">
                                    <span class="hr-simple left"></span>
                                    <i class="fa fa-circle hr-icon"></i>
                                    <span class="hr-simple right"></span>
                                </div>
                            </div><!-- .custom-heading.style-1 end -->

                            <p><?php echo character_limiter(strip_tags($product->aciklama),20);?></p>
                            <a href="#" class="more-details triggerAnimation animated" data-animate='fadeInUp'><span>Ürün Detay</span>
                                <i class="fa fa-angle-double-right"></i></a>
                        </figcaption>
                    </figure>
                </div><!-- .menu-sample.style-1 end -->
            </div><!-- .col-md-4 end -->     
            <?php } ?>       
        </div><!-- .row end -->
        <!-- .row start -->
    </div><!-- .container end -->
</div><!-- .page-content end -->