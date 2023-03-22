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

function get_about_cover_image($id) {
    $t = &get_instance();
    $t->load->model("pages_model");
    $image = $t->pages_model->get(
        array(
            "id" => $id,
            "durum" => 1
        )
    );   
    if (empty($image)) {
      $image=$t->pages_model->get(
        array(
            "id" => $id,
        )
    );
}   

    return !empty($image)?$image->resim:"";
}

function get_general_cover_image($id) {
    $t = &get_instance();
    $t->load->model("general_settings_model");
    $image = $t->general_settings_model->get(
        array(
            "id" => $id,
            "durum" => 1
        )
    );   
    if (empty($image)) {
      $image=$t->general_settings_model->get(
        array(
            "id" => $id,
        )
    );
}   

    return !empty($image)?$image->resim:"";
}
function get_contact_cover_image($id) {
    $t = &get_instance();
    $t->load->model("contact_settings_model");
    $image = $t->contact_settings_model->get(
        array(
            "id" => $id,           
        )
    );   
    if (empty($image)) {
      $image=$t->contact_settings_model->get(
        array(
            "id" => $id,
        )
    );
}   

    return !empty($image)?$image->resim:"";
}
function get_photo_cover_image($id) {
    $t = &get_instance();
    $t->load->model("photo_gallery_model");
    $image = $t->photo_gallery_model->get(
        array(
            "id" => $id,           
        )
    );   
    if (empty($image)) {
      $image=$t->photo_gallery_model->get(
        array(
            "id" => $id,
        )
    );
}   

    return !empty($image)?$image->resim:"";
}
function get_video_cover_image($id) {
    $t = &get_instance();
    $t->load->model("video_model");
    $image = $t->video_model->get(
        array(
            "id" => $id,           
        )
    );   
    if (empty($image)) {
      $image=$t->video_model->get(
        array(
            "id" => $id,
        )
    );
}   

    return !empty($image)?$image->resim:"";
}
function get_product_cover_image($id) {
    $t = &get_instance();
    $t->load->model("product_model");
    $image = $t->product_model->get(
        array(
            "id" => $id,           
        )
    );   
    if (empty($image)) {
      $image=$t->product_model->get(
        array(
            "id" => $id,
        )
    );
}   

    return !empty($image)?$image->resim:"";
}

function get_picture($path = "", $picture = "", $resolution = "50x50"){


    if($picture != ""){

        if(file_exists(FCPATH . "panel/uploads/$path/$resolution/$picture")){
            $picture = base_url("panel/uploads/$path/$resolution/$picture");
        } else {
            $picture = base_url("assets/assets/images/default_image.png");
        }

    } else {
        $picture = base_url("assets/assets/images/default_image.png");

    }

    return $picture;

}