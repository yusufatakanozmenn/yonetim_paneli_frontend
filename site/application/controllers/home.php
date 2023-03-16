<?php
class Home extends CI_Controller {
    public $viewFolder = "";
    public function __construct() {
        parent::__construct();
        $this->viewFolder = "home_v";
    }
    public function index() {
        $viewData = new stdClass();
        $viewData->viewFolder=$this->viewFolder;
        $this->load->view("{$viewData->viewFolder}/index",$viewData);
    }
}