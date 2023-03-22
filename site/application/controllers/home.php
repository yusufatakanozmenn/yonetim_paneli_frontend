<?php
class Home extends CI_Controller {
    public $viewFolder = "";
    public function __construct() {
        parent::__construct();
        $this->load->model("General_settings_model");

    }
    public function index() {
        $this->viewFolder = "home_v";
        $viewData = new stdClass();
        $this->load->model("slider_model");
        $slides = $this->slider_model->get_all(
            array(
                "durum" => 1
            ), "rank ASC"
        );
        $viewData->slides = $slides;
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }
    public function reservations() {
        $this->viewFolder = "reservations_v";
        $viewData = new stdClass();
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }

    public function blog() {
        $viewData = new stdClass();
        $this->viewFolder = "blog_v";
        $this->load->model("blog_model");
        $viewData->upload_path = $this->config->item('upload_path');
        $viewData->blogs = $this->blog_model->get_all(
            array(
                "durum" => 1               
            ),  "sira ASC"
        );
        $viewData->viewFolder=$this->viewFolder;

        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }

    public function about(){
        $this->viewFolder = "about_v";
        $this->load->model("pages_model");
        $viewData = new stdClass();
        $viewData->upload_path = $this->config->item('upload_path');
        $viewData->abouts = $this->pages_model->get(
            array(
                "durum" => 1
            )
        );
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }

    public function menu(){
        $this->viewFolder = "menu_v";
        $viewData = new stdClass();
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }
    public function contact() {
        $viewData = new stdClass();
        $this->viewFolder = "contact_v";
        $this->load->model("contact_settings_model");
        $viewData->upload_path = $this->config->item('upload_path');
        $viewData->contacts = $this->contact_settings_model->get(
            array(
                "id" => 1            
            ), 
        );
        $viewData->viewFolder=$this->viewFolder;

        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }

    public function foto_gallery() {
        $viewData = new stdClass();
        $this->viewFolder = "photo_gallery_v";
        $this->load->model("photo_gallery_model");
        $viewData->upload_path = $this->config->item('upload_path');
        $viewData->photos = $this->photo_gallery_model->get_all(
            array(
                "durum" => 1               
            ),  "sira ASC"
        );
        $viewData->viewFolder=$this->viewFolder;


        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }

    public function video_gallery() {
        $viewData = new stdClass();
        $this->viewFolder = "video_gallery_v";
        $this->load->model("video_model");
        $viewData->upload_path = $this->config->item('upload_path');
        $viewData->videos = $this->video_model->get_all(
            array(
                "durum" => 1               
            ),  "sira ASC"
        );
      
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }

    public function product() {
        $viewData = new stdClass();
        $this->viewFolder = "product_v";
        $this->load->model("product_model");
        $viewData->upload_path = $this->config->item('upload_path');
        $viewData->products = $this->product_model->get_all(
            array(
                "durum" => 1               
            ),  "sira ASC"
        );
        $viewData->viewFolder=$this->viewFolder;    

        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }
 
    public function product_details() {
        $viewData = new stdClass();
        $this->viewFolder = "product_details_v";
        $this->load->model("product_model");
        $viewData->upload_path = $this->config->item('upload_path');
        $viewData->products = $this->product_model->get_all(
            array(
                "durum" => 1
            ),  
        );
        $viewData->viewFolder=$this->viewFolder;    

        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }
  
}