<?php
class Sss extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "sss_v";
        $this->load->model("sss_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();        
        $items = $this->sss_model->get_all();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function save()
    {
        $insert = $this->sss_model->add(
            array(
                "sira" => $this->input->post("sira"),              
                "adi" => $this->input->post("adi"),               
                "seo" => $this->input->post("seo"),              
                "aciklama" => $this->input->post("aciklama"),              
                "durum" => 1,                      
            )
        );
        if($insert){
            redirect(base_url("sss"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function update($id)
    {
        $update = $this->sss_model->update(
            array(
                "id" => $id
            ),
            array(
                "sira" => $this->input->post("sira"),              
                "adi" => $this->input->post("adi"),               
                "seo" => $this->input->post("seo"),              
                "aciklama" => $this->input->post("aciklama"),              
            )
        );
        if($update){
            redirect(base_url("sss"));
        }
        else{
            echo "Kayıt Eklenemedi";
        }
    }
    public function add_form()
    {
        $viewData = new stdClass();        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update_form($id)
    {
        $viewData = new stdClass();        
        $viewData->viewFolder = $this->viewFolder;

        $item = $this->sss_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->subViewFolder = "update";
        $viewData->item = $item;

       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update_status($id){

        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->sss_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "durum" => $isActive            
                )
                );
        }else{
            echo 'Hatali islem';
        }
    }
  
    
    public function delete($id){
        $delete = $this->sss_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("sss"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
   
}