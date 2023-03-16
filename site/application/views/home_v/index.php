<!DOCTYPE html>
<html dir="ltr" lang="tr">

<head>
    <?php $this->load->view('includes/head'); ?>
</head>

<body>
    <?php $this->load->view('includes/header'); ?>
    <?php $this->load->view("{$viewFolder}/content"); ?>
    <?php $this->load->view('includes/footer'); ?>
    <?php $this->load->view('includes/copyright'); ?>
    <?php $this->load->view('includes/include_script'); ?>
</body>

</html>