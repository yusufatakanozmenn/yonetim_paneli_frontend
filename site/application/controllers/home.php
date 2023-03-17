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
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }
}