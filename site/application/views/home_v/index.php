<!DOCTYPE html>
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
        <!-- APP MAIN ==========-->
        <main id="app-main" class="app-main">
            <div class="wrap">
                <section class="app-content">
                    <?php $this->load->view("{$viewFolder}/content"); ?>
                </section><!-- #dash-content -->
            </div><!-- .wrap -->
            <!-- APP FOOTER -->
            <?php $this->load->view('includes/footer'); ?>
            <!-- /#app-footer -->
            <?php $this->load->view('includes/copyright'); ?>

        </main>
    </div>
    <?php $this->load->view('includes/include_script'); ?>

</body>

</html>