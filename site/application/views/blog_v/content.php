<!-- .page-content start -->
<div class="page-content custom-img-background dark page-title page-title-3 mb-100">
    <div class="container">
        <!-- .row start -->
        <div class="row">
            <!-- .col-md-12 start -->
            <div class="col-md-12 centered">
                <div class="custom-heading style-1 triggerAnimation animated" data-animate='fadeInUp'>
                    <h1><span>BLOG</span></h1>
                </div><!-- .custom-heading.style-1 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<!-- .page-content start -->
<div class="page-content">
    <div class="container">
        <!-- .row start -->
        <!-- .row start -->
        <div class="row">
            <ul class="col-md-12 blog-posts post-list">
                <?php foreach ($blogs as $blog) { ?>
                <li class="blog-post clearfix">
                    <ul class="post-meta">
                        <li>
                            <ul class="meta-time">
                                <li><?php echo $blog->tarih; ?><i class="fa fa-circle"></i></li>
                            </ul>
                        <li>
                        <li>
                            <ul class="meta-tags">
                                <li><?php echo $blog->seo; ?> <i class="fa fa-circle"></i></li>
                            </ul>
                        </li>
                    </ul><!-- .post-meta end -->
                    <div class="post-media">

                        <?php 

                        $image=get_blog_cover_image($blog->id);
                        $image = ($image) ? $upload_path."$viewFolder/$image":base_url("assets/img/blog/blog-1.jpg");
                        ?>

                        <a href="#"><img src="<?php echo $image;?>"
                                alt="Royal Plate - Restaurant & Catering HTML Template" /></a>
                    </div><!-- .post-media end -->
                    <div class="post-body">
                        <div class="custom-heading style-2">
                            <a href="blog-details.html">
                                <h3><?php echo $blog->adi; ?></h3>
                            </a>
                            <div class="divider style-1">
                                <i class="fa fa-circle hr-icon left"></i>
                                <span class="hr-simple right"></span>
                            </div>
                        </div><!-- .custom-heading.style-2 end -->
                        <p> <?php echo $blog->tarih; ?></p>

                        <a href="blog-details.html" class="more-details">Daha Fazla <i
                                class="fa fa-angle-double-right"></i></a>
                    </div><!-- .post-body end -->
                </li><!-- .blog-post end -->
                <?php } ?>

                <li class="pagination">
                    <ul>
                        <li class="active">
                            <a href="#">1</a>
                        </li>

                        <li>
                            <a href="#">2</a>
                        </li>
                    </ul>
                </li><!-- .pagination end -->
            </ul><!-- .col-md-12.blog-posts end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->