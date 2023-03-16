<?php
class Feature_Groups extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "feature_groups_v";
        $this->load->model("product_model");
	}
    public function index(){
        $viewData = new stdClass();
        /** Tablodaki tüm kayıtları getiriyoruz.. */
        $items = $this->product_model->get_all();
        /** View'e gönderilecek değişkenler.. */
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="list";
        $viewData->items=$items;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        /** View'e gönderilecek değişkenler.. */
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="add";

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

   public function save(){
    $this->product_model->add(
        array(
            "title" => "Deneme Ürünü",
            "description" => "Deneme Ürünü Açıklaması",
            "url" => "deneme-urunu",
            "rank" => 0,
            "isActive" => 1,
            "createdAt" => date("Y-m-d H:i:s")
        )
        );
   }



}
