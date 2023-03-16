<?php
class My_Contacts extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "my_contacts_v";
        $this->load->model("my_contacts_model");
	}
    public function index(){
        $viewData = new stdClass();
        $items = $this->my_contacts_model->get_all();
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="list";
        $viewData->items=$items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
public function update_form($id){
    $viewData = new stdClass();
    $item = $this->my_contacts_model->get(
        array(
            "id" => $id
        )
    );
    $viewData->viewFolder=$this->viewFolder;
    $viewData->subViewFolder="update";
    $viewData->item=$item;

    $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
}

public function update($id){
    $insert = $this->my_contacts_model->update(
        array(
            "id" => $id
        ),
        array(
            "adi" => $this->input->post("adi"),
            "email" => $this->input->post("email"),
            "telefon" => $this->input->post("telefon"),
            "notunuz" => $this->input->post("notunuz"),
        )
        );
    if($insert){
        redirect(base_url("my_contacts"));
    }
    else{
        echo "Silme İşlemi Gerçekleşmedi";
    }
}

public function add_form(){
    $viewData = new stdClass();
    $viewData->viewFolder=$this->viewFolder;
    $viewData->subViewFolder="add";
    $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
}

public function add(){

    $insert = $this->my_contacts_model->add(
        array(
            "adi" => $this->input->post("adi"),
            "email" => $this->input->post("email"),
            "telefon" => $this->input->post("telefon"),
            "notunuz" => $this->input->post("notunuz"),
            "tarih" => date("Y-m-d H:i:s"),
            "durum" => 1
        )
    );
    if($insert){
        redirect(base_url("my_contacts"));
    }
    else{
        echo "Silme İşlemi Gerçekleşmedi";
    }
}
public function update_status($id){

    if($id){
        $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
        $insert = $this->my_contacts_model->update(
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
    $delete = $this->my_contacts_model->delete(
        array(
            "id" => $id
        )
    );
    if($delete){
        redirect(base_url("my_contacts"));
    }
    else{
        echo "Silme İşlemi Gerçekleşmedi";
    }
}
}
