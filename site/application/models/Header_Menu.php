<?php
class Header_Menu extends CI_Controller {

	public $viewFolder = "";
	public function __construct()
	{
		parent::__construct();
		if (!get_active_user()){
			redirect(base_url("login"));
		}
		$this->viewFolder = "header_menu_v";
		$this->load->model("header_menu_model");
	}
    public function index(){
        $viewData = new stdClass();
		$items = $this->header_menu_model->get_all(
            array(
                "menu_ust" => 0
            )
        );
        $viewData->viewFolder=$this->viewFolder;
        $viewData->subViewFolder="list";
		$viewData->items=$items;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }
	public function new_form(){
		$viewData = new stdClass();
		$viewData->viewFolder=$this->viewFolder;
		$viewData->subViewFolder="add";
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}
	public function update_form($id){
        $viewData = new stdClass();
        $item = $this->header_menu_model->get(array("id" => $id));
        $sub_menu = $this->header_menu_model->get_all(array("menu_ust" => $id));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $viewData->sub_menu = $sub_menu;
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function update($id){
        $insert = $this->header_menu_model->update(
            array("id" => $id),
            array(
                "menu_ust"  => $this->input->post("menu_ust"),
                "menu_sira" => $this->input->post("menu_sira"),
                "menu_isim" => $this->input->post("menu_isim"),
                "link"      => convertToSEO($this->input->post("link")),
                "sekme"     => ($this->input->post("sekme") === "on")? 1:0,
            )
        );
        if ($insert){
            $alert = array(
                "title" => "İşlem Başarılı!",
                "text"  => "Değişiklikler uygulandı",
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("header_menu/update_form/$id"));
        }else{
            $alert = array(
                "title" => "İşlem Başarısız!",
                "text"  => "Değişiklikler uygulanamadı",
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("header_menu/update_form/$id"));
        }
    }
	public function update_status($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0 ;
            $insert = $this->header_menu_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "menu_durum" => $isActive            
                )
                );
        }else{
            echo 'Hatali islem';
        }
    }
	public function delete($id){
        $delete = $this->header_menu_model->delete(
            array(
                "id" => $id
            )
        );
        if($delete){
            redirect(base_url("header_menu"));
        }
        else{
            echo "Silme İşlemi Gerçekleşmedi";
        }
    }
    public function rankSetter(){


        $data = $this->input->post("data");

        parse_str($data, $order);
        $items = $order["ord"];

        foreach ($items as $rank => $id){

            $this->header_menu_model->update(
                array(
                    "id"            => $id,
                    "menu_sira !="  => $rank
                ),
                array(
                    "menu_sira"     => $rank
                )
            );

        }

    }



}
