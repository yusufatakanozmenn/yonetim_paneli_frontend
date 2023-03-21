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
                       <h3><span>Exquisite ambient</span></h3>
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
       <div class="container-fluid">
           <div class="row">
               <ul id="galleryitems" class="isotope isotopeitems-full">
                   <?php foreach ($videos as $video) { ?>
                   <li class="col-xs-6 col-md-3 isotope-item outdoor">
                       <figure class="gallery-item-container">
                           <div class="gallery-img">
                           <?php 

                            $image=get_video_cover_image($video->id);
                            $image = ($image) ? $upload_path."$viewFolder/$image":base_url("/img/pics/bkg-img8.jpg");
                            ?>
                               <img src="<?php echo $image;?>" alt="" />

                               <div class="hover-mask-container">
                                   <div class="hover-zoom">
                                       <a href="<?php echo $image;?>" class="triggerZoom fa fa-search"></a>
                                   </div><!-- .hover-zoom end -->
                               </div><!-- .hover-mask-container end -->
                           </div><!-- .gallery-img end -->

                       </figure><!-- .gallery-item-container end -->
                   </li><!-- .isotope-item end -->
                   <?php } ?>
               </ul><!-- #galleryitems.isotope end -->
           </div><!-- .row end -->
       </div><!-- .container-fluid end -->
   </div><!-- .page-content end -->
   <!-- .page-content start -->