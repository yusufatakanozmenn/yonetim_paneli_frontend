<?php
class Messages extends CI_Controller
{   
    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "messages_v";
        $this->load->model("messages_model");
        
    }
    public function index()
    {
        $viewData = new stdClass();        
        $items = $this->messages_model->get_all(
            array()
        );
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
       

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function mesaj_goster($id)
    {
        $mesaj=1;
        if ($mesaj==1) {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarıyla güncellendi",
                "type" => "success"
            );
        } 
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("messages"));
    }
    public function delete($id)
    {
        $delete = $this->messages_model->delete(
            array(
                "id" => $id
            )
        );
        if ($delete){
            redirect(base_url("messages"));
        }else{
            redirect(base_url("messages"));
        }
    }
}
