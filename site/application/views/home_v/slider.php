<?php $slides = $this->slider_model->get_all(array("durum" => 1), "rank ASC");?>
<div id="masterslider" class="master-slider ms-skin-default">
    <?php foreach ($slides as $slider) { ?>
        <div class="ms-slide " data-fill-mode="fill">
            <img src="./masterslider/style/blank.gif" data-src="<?= base_url() . 'panel/uploads/slider_v/'.$slider->resim ?>" alt="">
            <h2 class="ms-layer pi-caption01" style="top: 410px; left: 730px;" data-type="text" data-effect="bottom(40)" data-duration="1000" data-ease="easeOutExpo" data-delay="800">
                <?= $slider->adi ?>
            </h2>
            <div class="ms-layer divider" style="top: 505px; left: 737px;" data-type="text" data-effect="top(40)" data-duration="1000" data-ease="easeOutExpo" data-delay="1000">
                <span class="hr-double left"></span>
                <span class="hr-double right"></span>
            </div>
            <p class="ms-layer pi-text01" style="top: 590px; left: 862px;" data-type="text" data-effect="top(40)" data-duration="1000" data-ease="easeOutExpo" data-delay="1000">
                <?= $slider->aciklama ?>
            </p>
        </div>
    <?php } ?>
</div>