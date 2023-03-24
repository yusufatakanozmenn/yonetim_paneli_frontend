   <!-- .page-content start -->
   <div class="page-content custom-img-background dark page-title page-title-4 mb-100">
       <div class="container">
           <!-- .row start -->
           <div class="row">
               <!-- .col-md-12 start -->
               <div class="col-md-12 centered">
                   <div class="custom-heading style-1 triggerAnimation animated" data-animate='fadeInUp'>
                       <h1><span>Gallery</span></h1>

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
           <div class="row gallery-filters">
               <div class="col-md-12 mb-20 centered triggerAnimation animated" data-animate='fadeIn'>
                   <div class="custom-heading style-1">
                   
                       <h3>Restaurant gallery</h3>

                       <!-- .divider.style-1 start -->
                       <div class="divider style-1 center">
                           <span class="hr-simple left"></span>
                           <i class="fa fa-circle hr-icon"></i>
                           <span class="hr-simple right"></span>
                       </div>
                   </div><!-- .custom-heading.style-1 end -->
                  
               </div><!-- .col-md-12 end -->
           </div><!-- .row.gallery-filters end -->
       </div><!-- .container end -->
   </div><!-- .page-content end -->

   <div class="page-content">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-6 start -->
            <div class="col-md-12">
                <!-- .simple-gallery.row start -->
                <ul class="simple-gallery row">
                <?php foreach ($photos as $photo) { ?>
                    <!-- .col-md-6 start -->
                    <li class="gallery-item col-md-6 triggerAnimation animated" style="width: 25%;" data-animate='fadeIn'>
                         <?php 

                        $image=get_photo_cover_image($photo->id);
                        $image = ($image) ? $upload_path."$viewFolder/$image":base_url("/img/pics/bkg-img8.jpg");
                        ?>
                        <img src="<?php echo $image;?>" alt="" />
                        <div class="hover-mask-container">
                            <div class="hover-mask"></div>
                            <div class="hover-zoom">
                                <a href="<?php echo $image;?>" class="triggerZoom"></a>
                            </div><!-- .hover-details end -->
                        </div><!-- .hover-mask-container end -->
                    </li><!-- .col-md-6 end -->
                <?php } ?>
                    <!-- .col-md-6 start -->                    
                </ul>
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->
   <!-- .page-content start -->