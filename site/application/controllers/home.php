<?php
class Home extends CI_Controller {
    public $viewFolder = "";
    public function __construct() {
        parent::__construct();
        $this->viewFolder = "product_list_v";

    }
    public function index() {
       echo "Hello World";
    }
    public function product_list() {
       $viewData = new stdClass();
       $viewData->viewFolder ="product_list_v";
       $this->load->view($viewData->viewFolder, $viewData);
    }
}