<?php

function get_blog_cover_image($id) {
    $t = &get_instance();
    $t->load->model("blog_model");
    $image = $t->blog_model->get(
        array(
            "id" => $id,
            "durum" => 1
        )
    );   
    if (empty($image)) {
      $image=$t->blog_model->get(
        array(
            "id" => $id,
        )
    );
}   

    return !empty($image)?$image->resim:"";
}