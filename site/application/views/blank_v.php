<!DOCTYPE html>
<!-- <html lang="tr" class="ie9"> -->
<!-- <html lang="tr" class="ie"> -->

<html dir="ltr" lang="tr">

<head>
    <?php $this->load->view('includes/head'); ?>
</head>

<body>
    <div class="page-wrapper">
        <div id="header-wrapper">
            <header>
                <?php $this->load->view('includes/header'); ?>
            </header>
        </div>
        <div class="page-content custom-img-background bkg-img1">
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <!-- .col-md-3 start -->
                    <div class="col-md-3 col-sm-3 hidden-xs pt-80">
                        <img src="img/pics/spices-left.png" alt="Royal Plate - Restaurant & Catering HTML Template" />
                    </div><!-- .col-md-3 end -->

                    <!-- .col-md-6 start -->
                    <div class="col-md-6 col-sm-6 centered">
                        <div class="frame-box custom-img-background bkg-img2">
                            <div class="custom-heading style-1">
                                <h3><span>Our story</span></h3>
                                <h3>Love for food</h3>

                                <!-- .divider.style-1 start -->
                                <div class="divider style-1 center">
                                    <span class="hr-simple left"></span>
                                    <i class="fa fa-circle hr-icon"></i>
                                    <span class="hr-simple right"></span>
                                </div>
                            </div><!-- .custom-heading.style-1 end -->

                            <p>Welcome. This is Royal plate. Elegant &
                                sophisticated restaurant template. Royal plate offers different home page layouts with
                                smart and unique design, showcasing beautifully
                                designed elements every restaurant website should have. Smooth animations, fast loading
                                and engaging user experience are just some of the features this template offers.
                                <br />So, give it a try and dive into a world of royal restaurant websites.
                            </p>
                        </div>
                    </div><!-- .col-md-6 end -->

                    <!-- .col-md-3 start -->
                    <div class="col-md-3 col-sm-3 hidden-xs pt-80">
                        <img src="img/pics/spices-right.png" alt="Royal Plate - Restaurant & Catering HTML Template" />
                    </div><!-- .col-md-3 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-content end -->


        <div id="footer-wrapper">
            <footer>
                <?php $this->load->view('includes/footer'); ?>
            </footer>
        </div>
        <div id="copyright-container">
            <?php $this->load->view('includes/copyright'); ?>
        </div>

    </div>
    <?php $this->load->view('includes/include_script'); ?>

</body>

</html>