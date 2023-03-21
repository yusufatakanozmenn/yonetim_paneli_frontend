<!-- .page-content start -->
<div class="page-content custom-img-background dark page-title page-title-3 mb-100">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 centered">
                <div class="custom-heading style-1 triggerAnimation animated" data-animate='fadeInUp'>
                    <h1><span>Ürünler</span></h1>
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
                    <h3>Ürünler</h3>

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
            <?php foreach ($products as $product) { ?>

            <div class="col-md-4 col-sm-6 menu-package">
                <div class="menu-sample style-1 border-decor centered">
                    <figure>
                        <div class="menu-image">
                            <?php 

                            $image=get_product_cover_image($product->id);
                            $image = ($image) ? $upload_path."$viewFolder/$image":base_url("assets/img/blog/blog-1.jpg");
                            ?>
                        <img src="<?php echo $image;?>" />
                        </div>

                        <figcaption>
                            <div class="custom-heading style-1">
                                <h4><?php echo $product->adi; ?></h4>

                                <!-- .divider.style-1 start -->
                                <div class="divider style-1 center">
                                    <span class="hr-simple left"></span>
                                    <i class="fa fa-circle hr-icon"></i>
                                    <span class="hr-simple right"></span>
                                </div>
                            </div><!-- .custom-heading.style-1 end -->

                            <p><?php echo $product->aciklama; ?></p>
                            <a href="#" class="more-details triggerAnimation animated" data-animate='fadeInUp'>Ürün Detay
                                <i class="fa fa-angle-double-right"></i></a>
                        </figcaption>
                    </figure>
                </div><!-- .menu-sample.style-1 end -->
            </div><!-- .col-md-4 end -->
            <?php } ?>

        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->