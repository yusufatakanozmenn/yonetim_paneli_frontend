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