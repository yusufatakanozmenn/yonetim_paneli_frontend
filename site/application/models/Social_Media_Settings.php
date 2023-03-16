<?php
class Social_Media_Settings extends CI_Controller
{

    public $viewFolder = "";
    public function __construct()
    {
        parent::__construct();
        if (!get_active_user()){
			redirect(base_url("login"));
		}
        $this->viewFolder = "social_media_settings_v";
        $this->load->model("Social_Media_model");

    }
    public function index()
    {
        $viewData = new stdClass();
        $item = $this->Social_Media_model->get(array("id" => 1));
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {
        $update = $this->Social_Media_model->update(
            array(
                "id" => $id
            ),
            array(
                "facebook" => $this->input->post("facebook"),
                "twitter" => $this->input->post("twitter"),
                "instagram" => $this->input->post("instagram"),
                "linkedin" => $this->input->post("linkedin"),
                "youtube" => $this->input->post("youtube"),
            )
        );
        if ($update) {
            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarıyla güncellendi",
                "type" => "success"
            );
        } else {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Kayıt güncellenemedi",
                "type" => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("social_media_settings"));

    }



}