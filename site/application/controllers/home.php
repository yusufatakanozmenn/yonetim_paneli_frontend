<?php
class Home extends CI_Controller {
    public $viewFolder = "";
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->viewFolder = "home_v";
        $viewData = new stdClass();
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
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }
}