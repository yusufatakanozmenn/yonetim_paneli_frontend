<?php
class Dealer_Branch extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "dealer_branch_v";
        $this->load->model("dealer_branch_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();        
        $items = $this->dealer_branch_model->get_all();       
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function add_form()
    {
        $viewData = new stdClass();        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save()
    {
        $insert = $this->dealer_branch_model->add(
            array(
                "sira" => $this->input->post("sira"),                
                "adi" => $this->input->post("adi"),
                "adres" => $this->input->post("adres"),
                "telefon" => $this->input->post("telefon"),
                "gsm" => $this->input->post("gsm"),
                "email" => $this->input->post("email"),
                "il" => $this->input->post("il"),                
            )
        );
        if($insert){
            redirect(base_url("dealer_branch"));

        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function update_form($id){
        $viewData = new stdClass();
        $item = $this->dealer_branch_model->get(
            array(
                "id" => $id
            )
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        $update = $this->dealer_branch_model->update(
            array(
                "id" => $id
            ),
            array(
                "sira" => $this->input->post("sira"),                
                "adi" => $this->input->post("adi"),
                "adres" => $this->input->post("adres"),
                "telefon" => $this->input->post("telefon"),
                "gsm" => $this->input->post("gsm"),
                "email" => $this->input->post("email"),
                "il" => $this->input->post("il"), 
            )
        );
        if($update){
            redirect(base_url("dealer_branch"));
        }
        else{
            echo "Güncelleme İşlemi Gerçekleşmedi";
        }
    }

    public function delete($id){
        $delete = $this->dealer_branch_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("dealer_branch"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
}