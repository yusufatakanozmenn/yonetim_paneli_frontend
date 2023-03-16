<!DOCTYPE html>
<!-- <html lang="tr" class="ie9"> -->
<!-- <html lang="tr" class="ie"> -->

<html dir="ltr" lang="tr">

<head>
    <?php $this->load->view('includes/head'); ?>
</head>

<body>
    <div class="page-wrapper">

        <header>
            <?php $this->load->view('includes/header'); ?>
        </header>


        <?php $this->load->view("{$viewFolder}/content"); ?>


        <footer>
            <?php $this->load->view('includes/footer'); ?>
        </footer>


        <?php $this->load->view('includes/copyright'); ?>


    </div>
    <?php $this->load->view('includes/include_script'); ?>

</body>

</html>